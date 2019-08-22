<?php


/**
 * Description of Caja
 *
 * @author 01101801
 */
class PosArqueoscajaCore extends ObjectModel
{

    public $nombre_caja;
    public $monto_apertura;
    public $monto_operaciones;
    public $fecha_apertura;
    public $nota_apertura;
    public $monto_cierre;
    public $fecha_cierre;
    public $nota_cierre;
    public $estado; //1 abierto 0 cerrado
    public $id_employee_apertura;
    public $id_employee_cierre;
    public $id_shop;
    public $date_add;
    public $date_upd;
    public $id_pos_caja;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'pos_arqueoscaja',
        'primary' => 'id_pos_arqueoscaja',
        'fields' => array(
            // Lang fields
            'nombre_caja' => array('type' => self::TYPE_STRING),
            'monto_apertura' => array('type' => self::TYPE_FLOAT),
            'monto_operaciones' => array('type' => self::TYPE_FLOAT),
            'fecha_apertura' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
            'nota_apertura' => array('type' => self::TYPE_STRING),
            'monto_cierre' => array('type' => self::TYPE_FLOAT),
            'fecha_cierre' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
            'nota_cierre' => array('type' => self::TYPE_STRING),
            'estado' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'), //1 abierto 0 cerrado
            'id_employee_apertura' => array('type' => self::TYPE_INT, 'validate' => 'isInt'),
            'id_employee_cierre' => array('type' => self::TYPE_INT),
            'id_shop' => array('type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => true),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
            'id_pos_caja' => array('type' => self::TYPE_INT),
        ),
    );
}
