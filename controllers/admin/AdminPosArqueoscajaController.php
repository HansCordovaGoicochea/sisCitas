<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminCajaController
 *
 * @author 01101801
 */
class AdminPosArqueoscajaControllerCore extends AdminController
{
    protected $restrict_edition = false;
    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'pos_arqueoscaja';
        $this->className = 'PosArqueoscaja';
        $this->lang = false;
        $this->context = Context::getContext();
//        $this->addRowAction('edit');
//        $this->addRowAction('delete');
        $this->addRowAction('view');

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

        $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'employee` ea ON (ea.`id_employee` = a.`id_employee_apertura` AND a.`id_shop` = '.$this->context->shop->id.')';
        $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'employee` ec ON (ec.`id_employee` = a.`id_employee_cierre` AND a.`id_shop` = '.$this->context->shop->id.')';
        $this->_select .= 'CONCAT_WS(" ",ea.firstname, ea.lastname) as empleado_apertura, CONCAT_WS(" ",ea.firstname, ea.lastname) as empleado_cierre, IF(a.estado = 1, "Caja Abierta", "Caja Cerrada") estado_caja, estado
        ';

        $this->_where = Shop::addSqlRestriction(false, 'a');

        $this->fields_list = array(
//            'id_pos_arqueoscaja' => array('title' => $this->l('ID'), 'align' => 'center', 'class' => 'fixed-width-xs'),
            'fecha_apertura' => array('title' => $this->l('Fecha Apertura'),  'type' => 'datetime',),
            'empleado_apertura' => array('title' => $this->l('Cajero'),  'havingFilter' => true),
            'monto_apertura' => array('title' => $this->l('Fondo'),  'type' => 'price'),
            'monto_operaciones' => array('title' => $this->l('Ventas - Gastos'),  'type' => 'price'),
            'monto_cierre' => array('title' => $this->l('Cierre real (S/)'),  'type' => 'price'),
            'fecha_cierre' => array('title' => $this->l('Fecha Cierre'),  'type' => 'datetime',),
//            'estado_caja' => array('title' => $this->l('Estado'), 'align' => 'center', 'class' => 'fixed-width-sm', ),
        );

//        $nombre_access = Profile::getProfile($this->context->employee->id_profile);
//        if (isset($nombre_access['name']) && $nombre_access['name'] == "Cajero"){
//            $this->_where .= ' and a.id_employee_apertura = '.(int)$this->context->employee->id;
////          $this->_where .= 'AND tipo_documento_electronico in ("Boleta", "Factura") or current_state not in (2, 6) ';
//        }

        $this->_orderBy = 'fecha_apertura';
        $this->_orderWay = 'DESC';
        
    }


//    public function initToolbar()
//    {
//        parent::initToolbar();
//
//        unset($this->toolbar_btn['new']);
//
//    }

    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme);

        $this->addCSS(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/css/datatables.min.css');
        $this->addJs(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/js/datatables.min.js');

        $this->addCSS(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/css/waitMe.min.css');
        $this->addJs(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/js/waitMe.min.js');

    }

}