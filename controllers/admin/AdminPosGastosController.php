<?php


/**
 * Description of AdminCajaController
 *
 * @author 01101801
 */
class AdminPosGastosControllerCore extends AdminController
{
    protected $restrict_edition = false;
    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'pos_gastos';
        $this->className = 'PosGastos';
        $this->lang = false;
        $this->context = Context::getContext();
//        $this->addRowAction('edit');
//        $this->addRowAction('delete');

        parent::__construct();

        if (Context::getContext()->shop->getContext() != Shop::CONTEXT_SHOP && Shop::isFeatureActive()) {
            return $this->errors[] = $this->trans('Tiene que seleccionar una tienda antes.', array(), 'Admin.Orderscustomers.Notification');
        }

//        $this->bulk_actions = array(
//            'delete' => array(
//                'text' => $this->l('Delete selected'),
//                'confirm' => $this->l('Delete selected items?'),
//                'icon' => 'icon-trash'
//            )
//        );

        $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'employee` ea ON (ea.`id_employee` = a.`id_employee` AND a.`id_shop` = '.$this->context->shop->id.')';
        $this->_select .= 'CONCAT_WS(" ",ea.firstname, ea.lastname) as empleado';

        $this->_where = Shop::addSqlRestriction(false, 'a');

        $this->fields_list = array(
//            'id_pos_arqueoscaja' => array('title' => $this->l('ID'), 'align' => 'center', 'class' => 'fixed-width-xs'),
            'descripcion' => array('title' => $this->l('Descripción'),  'type' => 'text',),
            'monto' => array('title' => $this->l('Monto'),  'havingFilter' => true, 'type' => 'price',),
            'fecha' => array('title' => $this->l('Fecha'),  'type' => 'datetime'),
            'empleado' => array('title' => $this->l('Usuario'),  'type' => 'text',  'havingFilter' => true),
//            'estado_caja' => array('title' => $this->l('Estado'), 'align' => 'center', 'class' => 'fixed-width-sm', ),

        );

        $this->_orderBy = 'fecha';
        $this->_orderWay = 'DESC';
        
    }


    public function initPageHeaderToolbar()
    {

        if ($this->display == 'view') {
            $this->page_header_toolbar_btn['back_to_list'] = array(
                'href' => Context::getContext()->link->getAdminLink('AdminPosArqueoscaja'),
                'desc' => $this->l('Back to list', null, null, false),
                'icon' => 'process-icon-back'
            );
        }

        parent::initPageHeaderToolbar(); // TODO: Change the autogenerated stub
    }


    public function initToolbar()
    {
        parent::initToolbar();

        unset($this->toolbar_btn['new']);

    }

    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme);

        $this->addCSS(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/css/datatables.min.css');
        $this->addJs(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/js/datatables.min.js');

        $this->addCSS(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/css/waitMe.min.css');
        $this->addJs(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/js/waitMe.min.js');

        $this->addJS(_PS_JS_DIR_.'vendor/spin.js');
        $this->addJS(_PS_JS_DIR_.'vendor/ladda.js');
    }

    public function renderList()
    {

        $exist = count(PosCaja::getCajas());
        $this->context->smarty->assign(array(
            "exist_cajas" => $exist,
        ));

        return parent::renderList(); // TODO: Change the autogenerated stub
    }

    //metodo para abrir caja
    public function ajaxProcessAbrirCaja()
    {

//        d(Tools::getAllValues());
        if (Tools::getValue('id_pos_caja')){
            $obj_caja = new PosCaja((int)Tools::getValue('id_pos_caja'));
            $obj = new PosArqueoscaja();
            $obj->nombre_caja = $obj_caja->nombre_caja." - ".$this->context->shop->name;
            $obj->monto_apertura = (float)Tools::getValue('monto_apertura');
            $obj->monto_operaciones = (float)Tools::getValue('monto_apertura');
            $obj->fecha_apertura = date('Y-m-d H:i:s');
            $obj->nota_apertura = Tools::getValue('nota_apertura');
            $obj->estado = 1; // 0 cerrada 1 abierta
            $obj->id_employee_apertura = $this->context->employee->id;
            $obj->id_shop = $this->context->shop->id;
            $obj->id_pos_caja = $obj_caja->id;
            $res = $obj->add();

            $obj_caja->estado_apertura = 1;
            $obj_caja->update();

            if (!$res) {
                die(json_encode(array(
                    'result' => $res,
                    'error' => $this->trans('A ocurrido un error al hacer la apertura.', array(), 'Admin.Orderscustomers.Notification')
                )));
            }

            die(json_encode(array(
                'result' => $res,
                'obj' => $obj,
            )));
        }else{
            die(json_encode(array(
                'result' => false,
                'error' => $this->trans('No hay ninguna caja creada.', array(), 'Admin.Orderscustomers.Notification')
            )));
        }
    }

    //metodo para cerrar caja
    public function ajaxProcessCerrarCaja()
    {

//        d(Tools::getAllValues());
        if (Tools::getValue('id_pos_arqueoscaja')){

            $obj = new PosArqueoscaja((int)Tools::getValue('id_pos_arqueoscaja'));

            $obj_caja = new PosCaja((int)$obj->id_pos_caja);
            $obj_caja->estado_apertura = 0;
            $obj_caja->update();

            $obj->monto_cierre = (float)Tools::getValue('monto_cierre');
            $obj->fecha_cierre = date('Y-m-d H:i:s');
            $obj->nota_cierre = Tools::getValue('nota_cierre');
            $obj->estado = 0; // 0 cerrada 1 abierta
            $obj->id_employee_cierre = $this->context->employee->id;
            $res = $obj->update();

            if (!$res) {
                die(json_encode(array(
                    'result' => $res,
                    'error' => $this->trans('A ocurrido un error al hacer el cierre.', array(), 'Admin.Orderscustomers.Notification')
                )));
            }

            die(json_encode(array(
                'result' => $res,
                'obj' => $obj,
            )));
        }else{
            die(json_encode(array(
                'result' => false,
                'error' => $this->trans('No hay ninguna caja creada.', array(), 'Admin.Orderscustomers.Notification')
            )));
        }
    }

}