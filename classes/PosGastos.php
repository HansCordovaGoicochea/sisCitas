<?php

class PosGastosCore extends ObjectModel
{

    public $tiene_comprobante;
    public $fecha;
    public $descripcion;
    public $monto;
//    --- no obligatorio ---
    public $numero_doc_iden;
    public $nombre_empresa;
    public $tipo_comprobante;
    public $numero_comprobante;
    //    --- no obligatorio ---
    public $id_pos_caja;
    public $id_shop;
    public $id_employee;
    public $date_add;
    public $date_upd;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'pos_gastos',
        'primary' => 'id_pos_gastos',
        'fields' => array(
            // Lang fields
            'tiene_comprobante' => array('type' => self::TYPE_BOOL),
            'fecha' => array('type' => self::TYPE_DATE),
            'descripcion' => array('type' => self::TYPE_STRING),
            'monto' => array('type' => self::TYPE_FLOAT),
            'numero_doc_iden' => array('type' => self::TYPE_STRING),
            'nombre_empresa' => array('type' => self::TYPE_STRING),
            'tipo_comprobante' => array('type' => self::TYPE_STRING),
            'numero_comprobante' => array('type' => self::TYPE_STRING),
            'id_pos_caja' => array('type' => self::TYPE_INT),
            'id_employee' => array('type' => self::TYPE_INT),
            'id_shop' => array('type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => true),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
        ),
    );

}
