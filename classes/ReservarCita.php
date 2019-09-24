<?php

class ReservarCitaCore extends ObjectModel
{

    public $fecha_inicio;
    public $hora;
    public $id_colaborador;
    public $id_customer;
    public $product_id;
    public $product_name;
    public $color;
    public $observacion;
    public $id_order;
    //0 pendiente
    //1 cancelado
    //2 atendido
    //3 facturado
    public $estado_actual;
    public $id_employee;
    public $id_shop;
    public $date_add;
    public $date_upd;
    public $precio;
    public $adelanto;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'reservar_cita',
        'primary' => 'id_reservar_cita',
        'fields' => array(
            // Lang fields
            'fecha_inicio' => array('type' => self::TYPE_DATE),
            'hora' => array('type' => self::TYPE_STRING),
            'id_colaborador' => array('type' => self::TYPE_INT),
            'id_customer' => array('type' => self::TYPE_INT),
            'product_id' => array('type' => self::TYPE_INT),
            'product_name' => array('type' => self::TYPE_STRING),
            'color' => array('type' => self::TYPE_STRING),
            'observacion' => array('type' => self::TYPE_STRING),
            'id_order' => array('type' => self::TYPE_INT),
            'estado_actual' => array('type' => self::TYPE_BOOL),
            'id_employee' => array('type' => self::TYPE_INT),
            'id_shop' => array('type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => true),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),

            'precio' => array('type' => self::TYPE_FLOAT),
            'adelanto' => array('type' => self::TYPE_FLOAT),
        ),
    );

    public static function getCitasByColadorador($id_colaborador = null)
    {

        $sql = '
			SELECT *
			FROM `'._DB_PREFIX_.'reservar_cita`'.
            ($id_colaborador ? ' WHERE `id_colaborador` = '.(int)$id_colaborador : '');

        return Db::getInstance()->executeS($sql);

    }
    public static function getCitasByCliente($cliente_search)
    {

        $sql = '
			SELECT rc.*
			FROM `'._DB_PREFIX_.'reservar_cita` rc INNER JOIN `'._DB_PREFIX_.'customer` c
			ON (rc.id_customer = c.id_customer)
			 WHERE `num_document` = "'.$cliente_search.'"';

        return Db::getInstance()->executeS($sql);

    }

}
