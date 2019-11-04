<?php


use PrestaShop\PrestaShop\Core\Stock\StockManager;
use PrestaShop\PrestaShop\Adapter\StockManager as StockManagerAdapter;

/**
 * @property Order $object
 */
class AdminAtencionesControllerCore extends AdminController
{

    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'order_detail';
        $this->className = 'OrderDetail';
        $this->lang = false;
        $this->explicitSelect = true;
        $this->allow_export = true;
        $this->deleted = false;
        $this->context = Context::getContext();
        $this->addRowAction('view');

        parent::__construct();

        if (Context::getContext()->shop->getContext() != Shop::CONTEXT_SHOP && Shop::isFeatureActive()) {
            return $this->errors[] = $this->trans('Tiene que seleccionar una tienda antes.', array(), 'Admin.Orderscustomers.Notification');
        }

        $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'employee` ea ON (ea.`id_employee` = a.`id_colaborador`) ';
        $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'orders` o ON (o.`id_order` = a.`id_order` AND o.`id_shop` = '.$this->context->shop->id.') ';
        $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'customer` ec ON (ec.`id_customer` = o.`id_customer`) ';

        $this->_select .= 'CONCAT_WS(" - ", a.colaborador_name, a.product_name) as colaborador_servicio, CONCAT(ec.`firstname`, " (", ec.num_document, ") ") AS `customer`, o.date_add as fecha, SUM(product_quantity) as cantidad, sum(a.total_price_tax_incl) as total_servicio';

        $this->_where .= "
            AND DATE(o.date_add) = CURDATE()";

        $this->_orderBy = 'o.date_add';
        $this->_orderWay = 'DESC';
        $this->_use_found_rows = true;


        $statuses = OrderState::getOrderStates((int)$this->context->language->id);
        foreach ($statuses as $status) {
            if ($status['id_order_state'] == 1 || $status['id_order_state'] == 2 || $status['id_order_state'] == 6)
                $this->statuses_array[$status['id_order_state']] = $status['name'];
        }

        $this->fields_list = array(
            'id_order' => array(
                'title' => $this->trans('ID', array(), 'Admin.Global'),
                'align' => 'hide',
                'class' => 'hide',
                'filter_key' => 'o!id_order',
//                'remove_onclick' => true,
            ),
            'id_order_detail' => array(
                'title' => $this->trans('ID', array(), 'Admin.Global'),
                'align' => 'hide',
                'class' => 'hide',
                'filter_key' => 'a!id_order_detail',
//                'remove_onclick' => true,
            ),
            'customer' => array(
                'title' => $this->trans('Customer', array(), 'Admin.Global'),
                'havingFilter' => true,
//                'remove_onclick' => true,
            ),
            'date_add' => array(
                'title' => $this->trans('Fecha', array(), 'Admin.Global'),
                'type' => 'datetime',
                'search' => false,
                'filter_key' => 'o!date_add',
//                'remove_onclick' => true,
            ),
            'colaborador_servicio' => array(
                'title' => $this->trans('Colaborador - Servicio', array(), 'Admin.Global'),
                'havingFilter' => true,
//                'remove_onclick' => true,
            ),
        );
        $this->_group = ' group by a.product_id, a.id_colaborador, a.id_order_detail';
        $this->_where .= " AND o.current_state in (1) AND a.id_colaborador > 0";

    }
    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme);

        $this->addCSS(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/css/waitMe.min.css');
        $this->addJs(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/js/waitMe.min.js');

    }


    public function initPageHeaderToolbar()
    {
        parent::initPageHeaderToolbar();

        if (empty($this->display)) {
            $this->page_header_toolbar_btn['new_order'] = array(
                'href' => self::$currentIndex.'&addorder_detail&token='.$this->token,
                'desc' => $this->trans('Nueva Venta', array(), 'Admin.Orderscustomers.Feature'),
                'icon' => 'process-icon-new'
            );
        }

        if ($this->display == 'add') {
            unset($this->page_header_toolbar_btn['save']);
        }

        if (Context::getContext()->shop->getContext() != Shop::CONTEXT_SHOP && isset($this->page_header_toolbar_btn['new_order'])
            && Shop::isFeatureActive()) {
            unset($this->page_header_toolbar_btn['new_order']);
        }
    }

    public function renderForm()
    {

        if (Context::getContext()->shop->getContext() != Shop::CONTEXT_SHOP && Shop::isFeatureActive()) {
            $this->errors[] = $this->trans('You have to select a shop before creating new orders.', array(), 'Admin.Orderscustomers.Notification');
        }

        if ($this->display == 'add'){
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminVender'));
        }
    }

    public function ajaxProcessGetDetailAndPayments()
    {

        $order = new Order((int)Tools::getValue('id_order'));
        $pagos = $order->getOrderPayments();

        $detalle = $order->getOrderDetailList();
        foreach ($detalle as &$item) {
            $item['link'] = $this->context->link->getAdminLink('AdminProducts', true, ['id_product' => $item['product_id'], 'updateproduct' => '1']);
        }
        unset($item);


        die(Tools::jsonEncode(array('errors' => true, 'pagos' => $pagos, 'detalle' => $detalle)));
    }


    public function renderView()
    {

        $orderdetail = new OrderDetail(Tools::getValue('id_order_detail'));
        $order = new Order($orderdetail->id_order);
        if (!Validate::isLoadedObject($order)) {
            $this->errors[] = $this->trans('The order cannot be found within your database.', array(), 'Admin.Orderscustomers.Notification');
        }

        $this->context->cookie->__set("ruta_order_back", "atenciones");

        Tools::redirectAdmin($this->context->link->getAdminLink('AdminVender').'&tipo_venta_edit=atencion&id_order_atencion='.$order->id.'');



        return parent::renderView();
    }
}
