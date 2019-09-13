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
class AdminReporteServiciosColaboradorControllerCore extends AdminController
{

    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'order_detail';
        $this->className = 'OrderDetail';
        $this->lang = false;
        $this->multishop_context = Shop::CONTEXT_ALL;
//        $this->addRowAction('edit');
//        $this->addRowAction('delete');
//        $this->addRowAction('view');

        $this->context = Context::getContext();

        parent::__construct();


        $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'employee` ea ON (ea.`id_employee` = a.`id_colaborador`)';
        $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'orders` o ON (o.`id_order` = a.`id_order` AND o.`id_shop` = '.$this->context->shop->id.')';
        $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'customer` ec ON (ec.`id_customer` = o.`id_customer`)';

        $this->_select .= 'CONCAT_WS(" ",ea.firstname, ea.lastname) as colaborador, ec.firstname as cliente, o.date_add as fecha';
        $this->_where = ' AND es_servicio = 1 AND id_colaborador = '. Tools::getValue('id_colaborador').' AND valid = 1 AND o.date_add BETWEEN '.Tools::getValue('fi').' AND '.Tools::getValue('ff');


        $this->_orderBy = 'o.date_add';
        $this->_orderWay = 'DESC';
        $this->list_simple_header = true;
//        $this->allow_export = true;

        $this->fields_list = array(
            'id_order_detail' => array(
                'title' => $this->l('ID'),
                'align' => 'hide',
                'class' => 'hide',
                'remove_onclick' => true
            ),
            'colaborador' => array(
                'title' => $this->l('Colaborador'),
                'remove_onclick' => true
            ),
            'fecha' => array(
                'title' => $this->l('Fecha'),
                'remove_onclick' => true
            ),
            'cliente' => array(
                'title' => $this->l('Cliente'),
                'remove_onclick' => true
            ),
            'total_price_tax_incl' => array(
                'title' => $this->l('Importe'),
                'type' => 'price',
                'remove_onclick' => true
            ),

        );

    }
    public function initToolbar()
    {
        parent::initToolbar();
        unset($this->toolbar_btn['new']);

    }

}