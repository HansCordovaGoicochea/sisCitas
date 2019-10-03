<?php

class AdminReservarCitaControllerCore extends AdminController
{
    protected $existeCajasAbiertas;
    protected $nombre_access;
    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'reservar_cita';
        $this->className = 'ReservarCita';
        $this->lang = false;
        $this->colorOnBackground = true;
        $this->context = Context::getContext();
        $this->addRowAction('edit');
//        $this->addRowAction('delete');
//        $this->addRowAction('view');
        $this->addRowAction('pasar_venta');
        $this->addRowAction('anularcita');

        $this->existeCajasAbiertas = PosArqueoscaja::existenCajasAbiertas();
        $this->nombre_access = Profile::getProfile(Context::getContext()->employee->id_profile);

        parent::__construct();


        $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'employee` ea ON (ea.`id_employee` = a.`id_colaborador` AND a.`id_shop` = '.$this->context->shop->id.')';
        $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'customer` ec ON (ec.`id_customer` = a.`id_customer` AND a.`id_shop` = '.$this->context->shop->id.')';
        $this->_select .= 'CONCAT_WS(" ",ea.firstname, ea.lastname) as colaborador, ec.firstname as cliente, IF(estado_actual = 0, "Pendiente", IF(estado_actual = 1, "Atendido", IF(estado_actual = 2, "Cancelado", "Facturado"))) as estado, estado_actual';

        $this->_orderBy = 'fecha_inicio';
        $this->_orderWay = 'DESC';

        $this->fields_list = array(
            'id_reservar_cita' => array('align' => 'hide', 'class' => 'hide'),
            'fecha_inicio' => array('title' => $this->l('Fecha'),  'type' => 'date',),
            'hora' => array('title' => $this->l('Hora'),  'havingFilter' => true),
            'colaborador' => array('title' => $this->l('Colaborador'),  'havingFilter' => true),
            'cliente' => array('title' => $this->l('Cliente'),  'havingFilter' => true),
            'product_name' => array('title' => $this->l('Servicio'),  'havingFilter' => true),
            'precio' => array('title' => $this->l('Precio'),  'search' => false,  'type' => 'price'),
            'adelanto' => array('title' => $this->l('Monto Adelantado'),  'search' => false,  'type' => 'price'),
            'estado' => array('title' => $this->l('Estado'),  'havingFilter' => true, 'color' => 'color'),
        );
        
    }

    public function displayAnularcitaLink($token = null, $id)
    {
        $cita = new ReservarCita((int)$id);

        if ($cita->estado_actual != 0){
//            if (($key = array_search($this->action, $this->actions)) !== false) {
//                unset($this->actions[$key]);
//            }
            return false;
        }

        $href = self::$currentIndex.'&'.$this->identifier.'='.(int)$id.'&action=anularcita&token='.($token != null ? $token : $this->token);

        $this->context->smarty->assign(array(
            "href" => $href,
            $this->identifier => $id,
            'action' => "Anular",
            'confirm' => "¿Seguro de anular la cita?",
        ));
//
        return $this->context->smarty->fetch('controllers/reservar_cita/helpers/list/list_action_anularcita.tpl');
    }

    public function processAnularcita()
    {
        if (Validate::isLoadedObject($object = $this->loadObject())) {
            $object->estado_actual = 2;
            $object->update();
        } else {
            $this->errors[] = $this->trans('Error al anular la cita.', array(), 'Admin.Notifications.Error')
                .' <b>'.$this->table.'</b> '.$this->trans('(cannot load object)', array(), 'Admin.Notifications.Error');
        }
        return true;
    }

    public function getList($id_lang, $orderBy = null, $orderWay = null, $start = 0, $limit = null, $id_lang_shop = null)
    {
        parent::getList($id_lang, $orderBy, $orderWay, $start, $limit, $id_lang_shop);

        if ($this->_list) {
            foreach ($this->_list as &$row) {
                if ((int)$row['estado_actual'] == 0){
                    $row['color'] =  "#ffc107"; // rojo
                }
                elseif ((int)$row['estado_actual'] == 1){
                    $row['color'] =  "#25b9d7"; // rojo
                }
                elseif ((int)$row['estado_actual'] == 2){
                    $row['color'] =  "#dd2246"; // rojo
                }
                elseif ((int)$row['estado_actual'] == 3){
                    $row['color'] =  "#72c279"; // rojo
                }

            }
        }
    }

    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme); // TODO: Change the autogenerated stub

        $this->addJqueryPlugin('autocomplete');
        $this->addCSS(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/css/waitMe.min.css');
        $this->addJs(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/js/waitMe.min.js');
        $this->addCSS(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/template/controllers/reservar_cita/css/select2-reserva.css');

        $this->addjQueryPlugin(array(
            'select2',
        ));
        $this->addJS(_PS_JS_DIR_.'jquery/plugins/select2/select2_locale_es.js');

    }

    public function initPageHeaderToolbar()
    {

        if ($this->display == 'edit' || $this->display == 'add') {
            $this->page_header_toolbar_btn['back_to_list'] = array(
                'href' => Context::getContext()->link->getAdminLink('AdminReservarCita'),
                'desc' => $this->l('Back to list', null, null, false),
                'icon' => 'process-icon-back'
            );
        }

        if (empty($this->display))
            $this->page_header_toolbar_btn['new_cita'] = array(
                'href' => self::$currentIndex.'&addreservar_cita&token='.$this->token,
                'desc' => $this->l('Crear Cita', null, null, false),
                'icon' => 'process-icon-new'
            );

        parent::initPageHeaderToolbar();
    }

    public function renderForm()
    {

        $cita = new ReservarCita((int)Tools::getValue('id_reservar_cita'));
        $customer = new Customer((int)$cita->id_customer);
        $this->fields_form = array(
            'legend' => array(
                'title' => $this->l('Cita'),
                'icon' => 'icon-group'
            ),
            'input' => array(),
            'submit' => array(
                'title' => $this->l('Save'),
            )
        );


        $colaboradores = Employee::getColaboradores(true);
        $tipo_documentos = Tipodocumentolegal::getAllTipDoc();
        $this->context->smarty->assign(array(
            'cita' => $cita,
            'customer' => $customer,
            'colaboradores' => $colaboradores,
            'tipo_documentos' => $tipo_documentos,
            'existeCajasAbiertas' =>  $this->existeCajasAbiertas,
            'nombre_access' =>  $this->nombre_access['name'],
            'tpl_folder' => __PS_BASE_URI__ . $this->admin_webpath .'/themes/default/template/'. $this->tpl_folder,
        ));

        return parent::renderForm();
    }

    public function ajaxProcessGuardarCita()
    {
        $data = Tools::getValue('data');
        $params = array();
        parse_str($data, $params);

//        d($params);
        $id_reservar_cita = $params['id_reservar_cita'];


        if (isset($params['id_customer']) && $params['id_customer'] > 0){
            $customer = new Customer((int)$params['id_customer']);
            $customer->id_document = $params['cb_tipo_documento'];
            $customer->num_document = trim($params['txtNumeroDocumento']);
            $customer->firstname = $params['txtNombre'];
            $customer->direccion = $params['txtDireccion'];
            $customer->birthday = $params['birthday'] && $params['birthday'] != '0000-00-00' && $params['birthday'] != '1969-12-31' ? Tools::getFormatFechaGuardar($params['birthday']) : null;
            $customer->telefono_celular = $params['celular'];
            $customer->update();
            $id_cliente = $customer->id;
        }
        else{
            $customer = new Customer();
            $customer->id_shop_group = Context::getContext()->shop->id_shop_group;
            $customer->id_shop = Context::getContext()->shop->id;
            $customer->id_gender = 0;
            $customer->id_default_group = (int) Configuration::get('PS_CUSTOMER_GROUP');
            $customer->id_lang = Context::getContext()->language->id;
            $customer->id_risk = 0;
            $customer->firstname = $params['txtNombre'];
            $customer->lastname = "";
            $pass = $this->get('hashing')->hash("123456789", _COOKIE_KEY_);
            $customer->passwd = $pass;
            $customer->last_passwd_gen = date('Y-m-d H:i:s', strtotime('-'.Configuration::get('PS_PASSWD_TIME_FRONT').'minutes'));
            $customer->birthday = $params['birthday'] != '0000-00-00' && $params['birthday'] != '1969-12-31' ? Tools::getFormatFechaGuardar($params['birthday']) : null;
            $customer->newsletter = 0;
            $customer->optin = 0;
            $customer->outstanding_allow_amount = 0;
            $customer->show_public_prices = 0;
            $customer->max_payment_days = 0;
//                d(md5(uniqid(rand(), true)));
            $customer->secure_key = md5(uniqid(rand(), true));
            $customer->active = 1;
            $customer->is_guest = 0;
            $customer->deleted = 0;
            $customer->id_document = $params['cb_tipo_documento'];
            $customer->num_document = trim($params['txtNumeroDocumento']);
            $customer->direccion = $params['txtDireccion'] ;
            $customer->telefono_celular = $params['celular'] ;
            $res = $customer->add();
            if ($res){
                $customer->updateGroup(array($customer->id_default_group));
            }

            $id_cliente = $customer->id;
        }

        if (isset($id_reservar_cita) && (int)$id_reservar_cita > 0){
            $obj = new ReservarCita((int)$id_reservar_cita);
        }else{
            $obj = new ReservarCita();
        }
        //formatear fecha con hora 12 horas
        $startdate = $params['fecha_inicio'];
        $myDateTime = DateTime::createFromFormat('d/m/Y h:i A',$startdate);
        $fecha_inicio = $myDateTime->format('Y-m-d H:i:s');
        $hora = $myDateTime->format('h:i A');

        $obj->fecha_inicio = $fecha_inicio;
        $obj->hora = $hora;
        $obj->id_colaborador = $params['id_colaborador'];
        $obj->id_customer = $id_cliente;
        $obj->product_id = $params['product_id'];
        $obj->product_name = $params['product_name'];
        $obj->color = "#000";
        $obj->observacion = $params['observacion'];
        $obj->id_order = 0;
        $obj->estado_actual = $params['estado_actual'];
        $obj->precio = $params['precio'];
        $obj->adelanto = $params['adelanto'];
        $obj->id_employee = $this->context->employee->id;
        $obj->id_shop = $this->context->shop->id;

        if ($id_reservar_cita){
            $res = $obj->update();
        }else{
            $res = $obj->add();
        }
        if ($res){
            die(json_encode(array(
                "respuesta" => "ok",
                "cita" => $obj,

            )));
        }else{
            die(json_encode(array(
                "respuesta" => "error",

            )));
        }

    }

    public function ajaxProcessGetProductByName()
    {

        $query = Tools::getValue('q', false);
        if ( ! $query or $query == '' or strlen($query) < 1) {
            die();
        }

        if ($pos = strpos($query, ' (ref:')) {
            $query = substr($query, 0, $pos);
        }

        $context = Context::getContext();

        $sql = new DbQuery();
        $sql->select('p.id_product as id, pl.name as text, p.*, product_shop.*, pl.*');
        $sql->from('product', 'p');
        $sql->join(Shop::addSqlAssociation('product', 'p'));
        $sql->leftJoin('product_lang', 'pl', '
			p.`id_product` = pl.`id_product`
			AND pl.`id_lang` = '.(int)$context->language->id.Shop::addSqlRestrictionOnLang('pl')
        );

        $where = '1 ';

        $search_items = explode(' ', $query);
        $research_fields = array('pl.`name`', 'p.`reference`');

        $items = array();
        foreach ($research_fields as $field) {
            foreach ($search_items as $item) {
                $items[$item][] = $field.' LIKE \'%'.pSQL($item).'%\' ';
            }
        }
        $where .= ' AND p.is_virtual = 1 ';
        foreach ($items as $likes) {
            $where .= ' AND ('.implode(' OR ', $likes).') ';
        }

        $sql->where($where);

        $items = Db::getInstance()->executeS($sql, true, false);
        $to_return = array(
            'products' => $items,
            'found' => true
        );
        die(json_encode($to_return));

    }

    public function ajaxProcessRealizarVenta(){

//        d(Tools::getAllValues());
        if(Tools::getValue('id_reservar_cita')){
            $objCita = new ReservarCita((int)Tools::getValue('id_reservar_cita'));
            $id_colaborador_old = $objCita->id_colaborador;
            if(Tools::getValue('id_colaborador') && (int)$id_colaborador_old != (int)Tools::getValue('id_colaborador')){
                $objCita->id_colaborador = Tools::getValue('id_colaborador');
                $objCita->update();
            }

            $cart = new Cart();
            $cart->id_customer = $objCita->id_customer; // verificar esto del cliente
            $cart->id_address_delivery = (int)  (Address::getFirstCustomerAddressId($cart->id_customer));
            $cart->id_address_invoice = $cart->id_address_delivery;
            $cart->id_lang = (int)($this->context->language->id);
            $cart->id_currency = (int)($this->context->currency->id);
            $cart->id_carrier = 1;
            $cart->recyclable = 0;
            $cart->gift = 0;
            $cart->add();
//            $this->context->cookie->id_cart = (int)($cart->id);
//            $cart->update();

            $id_cart = $cart->id;
            Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'customization` WHERE `id_cart` = '.(int)$id_cart);
            Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'cart_cart_rule` WHERE `id_cart` = '.(int)$id_cart);
            Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'cart_product` WHERE `id_cart` = '.(int)$id_cart);

            $prod = new Product((int)$objCita->product_id, true, (int)($this->context->language->id));
            $prod_update = $cart->updateQty(1, (int)$objCita->product_id,null, false, 'up', 0 , new Shop((int)$cart->id_shop));

            $summary = $cart->getSummaryDetails($this->context->language->id,true);
            $total = (string) $summary['total_price'];
            $cashondelivery = Module::getInstanceByName("ps_checkpayment");


            if($cashondelivery->validateOrder(
                (int)$cart->id,
                Configuration::get('PS_OS_CHEQUE'),
                $total,
                "Venta desde Citas",
                null,
                array(),
                $cart->id_currency
            )) {
                PrestaShopLogger::addLog($this->trans('Venta creada desde Reserva de cita: %ip%', array('%ip%' => Tools::getRemoteAddr()), 'Admin.Advparameters.Feature'), 1, null, '', 0, true, (int)$this->context->employee->id);
                $result['orderid'] = (string)$cashondelivery->currentOrder;

                $last_caja = PosArqueoscaja::getCajaLast($this->context->shop->id);
                $order = new Order((int)$result['orderid']);
                $order->id_pos_caja = $last_caja['id_pos_caja'];
                $order->id_employee = $this->context->employee->id;
                $order->id_colaborador = $objCita->id_colaborador;

                $col = new Employee((int)$objCita->id_colaborador);
                $order->colaborador_name = $col->firstname.' '. $col->lastname;
                $order->update();

                $ordeD = OrderDetailCore::getList($order->id);
                foreach ($ordeD as $k => $val) {
//                    foreach(Tools::getValue('productos') as $key=>$product) {
                        $oderDetalle = new OrderDetail((int)$val['id_order_detail']);
                        if ($oderDetalle->product_id === $objCita->product_id){
//                            $oderDetalle->product_name = $product['title'];
                            $oderDetalle->id_colaborador = $objCita->id_colaborador;
                            $oderDetalle->colaborador_name = $col->firstname.' '. $col->lastname;
                            $oderDetalle->es_servicio = 1;
                            $oderDetalle->update();
                        }
//                    }
                }

//                $objCita->estado_actual = 3; //facturado
                $objCita->estado_actual = 1; //Atendido
                $objCita->id_order = $order->id;
                $objCita->update();

                if ($objCita->adelanto > 0){

                        $amount = str_replace(',', '.', $objCita->adelanto);
                        $vuelto_pago = 0;
                        $ultimopago = 0;
                        foreach ($order->getOrderPaymentCollection() as $payment){
                            $ultimopago += $payment->amount;
                        }

                        if ($amount > $order->total_paid){
                            $vuelto_pago = $amount - $order->total_paid;
                            $amount = $order->total_paid;
                        } else {
                            $ultimopago_final = $order->total_paid - $ultimopago ;
                            if($amount > $ultimopago_final){
                                $vuelto_pago = $amount - $ultimopago_final;
                                $amount = $ultimopago_final;
                            }
                        }

                        $currency = new Currency($order->id_currency);
                        $order_invoice = null;

                        if (!Validate::isLoadedObject($order)) {
                            $this->errors[] = $this->trans('The order cannot be found', array(), 'Admin.Orderscustomers.Notification');
                        } elseif (!Validate::isNegativePrice($amount) || !(float)$amount) {
                            $this->errors[] = $this->trans('The amount is invalid.', array(), 'Admin.Orderscustomers.Notification');
                        } elseif (!Validate::isLoadedObject($currency)) {
                            $this->errors[] = $this->trans('The selected currency is invalid.', array(), 'Admin.Orderscustomers.Notification');
                        } elseif (!Validate::isDate($order->date_add)) {
                            $this->errors[] = $this->trans('The date is invalid', array(), 'Admin.Orderscustomers.Notification');
                        } else {
                            if (!$order->addOrderPayment($amount, "Efectivo", null, $currency, $order->date_add, $order_invoice, $vuelto_pago, 1, null, $this->context->employee->id)) {
                                $this->errors[] = $this->trans('An error occurred during payment.', array(), 'Admin.Orderscustomers.Notification');

                            } else {
                                $suma_pagos = 0;

                                foreach ($order->getOrderPaymentCollection() as $payment) {
                                    $suma_pagos += $payment->amount;
                                }

                                if ($suma_pagos >= $order->total_paid_tax_incl){
                                    //pago correcto
                                    $order_state = new OrderState((int)ConfigurationCore::get('PS_OS_PAYMENT'), (int)$this->context->language->id);
                                    $current_order_state = $order->getCurrentOrderState();

                                    if ($current_order_state->id != $order_state->id) {
                                        // Create new OrderHistory
                                        $history = new OrderHistory();
                                        $history->id_order = $order->id;
                                        $history->id_employee = (int)$this->context->employee->id;

                                        $use_existings_payment = false;
                                        if (!$order->hasInvoice()) {
                                            $use_existings_payment = true;
                                        }
                                        $history->changeIdOrderState((int)$order_state->id, $order, $use_existings_payment);

                                        // Save all changes
                                        if ($history->addWithemail(true)) {
                                            // synchronizes quantities if needed..
                                            if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT')) {
                                                foreach ($order->getProducts() as $product) {
                                                    if (StockAvailable::dependsOnStock($product['product_id'])) {
                                                        StockAvailable::synchronize($product['product_id'], (int)$product['id_shop']);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }

                                $obj_caja = new PosArqueoscaja((int)$last_caja['id_pos_arqueoscaja']);
                                $monto_temp = $obj_caja->monto_operaciones;
                                $obj_caja->monto_operaciones = $monto_temp + $amount;
                                $obj_caja->update();

                            }
                        }
                }

                $this->crearTicketVenta($order);
                $link_venta =  $this->context->link->getAdminLink('AdminOrders').'&vieworder&id_order='.$order->id;
                $this->ajaxDie(json_encode(array('response' => 'ok', 'order' => $order, 'cart' => $this->context->cart, 'objCita' => $objCita, 'link_venta' => $link_venta)));
            }else{
                $this->ajaxDie(json_encode(array('response' => 'failed', 'msg' => '¡Error al Ralizadar la venta!')));
            }

        }else{
            $this->ajaxDie(json_encode(array('response' => 'failed', 'msg' => '¡Error al Ralizadar la venta!')));
        }
    }

    protected function crearTicketVenta($order){
        $nombre_virtual_uri = $this->context->shop->virtual_uri;

        $correlativo_comanda = NumeracionDocumento::getNumTipoDoc('Ticket');
        if (empty($correlativo_comanda)){
            $objNC = new NumeracionDocumento();
            $objNC->serie = '';
            $objNC->correlativo = 0;
            $objNC->nombre = 'Ticket';
            $objNC->id_shop = Context::getContext()->shop->id;
            $objNC->add();
            $correlativo_comanda = NumeracionDocumento::getNumTipoDoc('Ticket');
        }
        else{
            $correlativo_comanda = NumeracionDocumento::getNumTipoDoc('Ticket');
        }

        if (!$order->nro_ticket){
            $co = new NumeracionDocumento((int)$correlativo_comanda['id_numeracion_documentos']);
            $co->correlativo = ($correlativo_comanda['correlativo']+1);
            $co->update();
            $numero_de_ticket = $correlativo_comanda['correlativo'];
            $monbre_archivo='Ticket_numero_'.($numero_de_ticket+1).'.pdf';
            $order->nro_ticket = ($numero_de_ticket+1);

        }
        else{
            $numero_de_ticket = $order->nro_ticket;
            $monbre_archivo='Ticket_numero_'.($numero_de_ticket).'.pdf';
        }

        $ruta = 'archivos_sunat/'.$nombre_virtual_uri;
        $ruta_documentos = 'documentos_pdf/'.$nombre_virtual_uri;
        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
        }
        if (!file_exists($ruta_documentos)) {
            mkdir($ruta_documentos, 0777, true);
        }

        $order->ruta_ticket_normal = $ruta_documentos.'/'.$monbre_archivo;
        $order->update();

        $pdf_ticket = new PDF($order, ucfirst('FacturaVentaRapida'), Context::getContext()->smarty,'P');
        $pdf_ticket->Guardar($monbre_archivo, "", 'ticket', "");

        $this->confirmations[] = $order;

    }

    public function ajaxProcessAnularcita()
    {
        if(Tools::getValue('id_reservar_cita')) {
            $objCita = new ReservarCita((int)Tools::getValue('id_reservar_cita'));
            $objCita->estado_actual = 2;
            $objCita->update();
        }
        $this->ajaxDie(json_encode(array('response' => 'ok')));
    }
}

