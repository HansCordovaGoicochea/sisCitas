<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
    public $monto_apertura_dolares;
    public $monto_operaciones_dolares;
    public $fecha_apertura;
    public $nota_apertura;
    public $monto_cierre;
    public $monto_cierre_dolares;
    public $fecha_cierre;
    public $nota_cierre;
    public $estado; //1 abierto 0 cerrado
    public $id_employee_apertura;
    public $id_employee_cierre;
    public $id_shop;
    public $date_add;
    public $date_upd;

    public $id_employee_cuentamayor;
    public $estado_cuenta_mayor;

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
            'monto_apertura_dolares' => array('type' => self::TYPE_FLOAT),
            'monto_operaciones_dolares' => array('type' => self::TYPE_FLOAT),
            'fecha_apertura' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
            'nota_apertura' => array('type' => self::TYPE_STRING),
            'monto_cierre' => array('type' => self::TYPE_FLOAT),
            'monto_cierre_dolares' => array('type' => self::TYPE_FLOAT),
            'fecha_cierre' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
            'nota_cierre' => array('type' => self::TYPE_STRING),
            'estado' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'), //1 abierto 0 cerrado
            'id_employee_apertura' => array('type' => self::TYPE_INT, 'validate' => 'isInt'),
            'id_employee_cierre' => array('type' => self::TYPE_INT),
            'id_shop' => array('type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => true),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),

            'id_employee_cuentamayor' => array('type' => self::TYPE_INT),
            'estado_cuenta_mayor' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'), //1 cuenta abierto 0 cuenta cerrado
        ),
    );

    public static function getCajaLast($id_shop)
    {
        $nombre_access = Profile::getProfile(Context::getContext()->employee->id_profile);
//        d($nombre_access['name']);
        if ($nombre_access['name'] == 'Cajero'){
            return Db::getInstance()->getRow('
			SELECT *
			FROM `'._DB_PREFIX_.'pos_arqueoscaja`
			WHERE estado = 1 AND `id_shop` = '.$id_shop.' AND id_employee_apertura = '.Context::getContext()->employee->id.'
			ORDER BY fecha_apertura DESC
		');
        }else{
            return false;
        }
    }

    public static function existenCajasAbiertas($id_shop = null)
    {

        if (!$id_shop)
            $id_shop = Context::getContext()->shop->id;

        return (bool)Db::getInstance()->getValue('
			SELECT id_pos_arqueoscaja
			FROM `'._DB_PREFIX_.'pos_arqueoscaja`
			WHERE `id_shop` = '.$id_shop.' AND estado = 1
			ORDER BY fecha_apertura DESC
		');

    }
    public static function cajasAbiertas($id_shop = null)
    {
        if (!$id_shop)
            $id_shop = Context::getContext()->shop->id;

        return Db::getInstance()->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'pos_arqueoscaja`
			WHERE `id_shop` = '.$id_shop.' AND estado = 1
			ORDER BY fecha_apertura DESC
		');
    }
    public static function cajasAbiertasJoinEmpleado($id_shop = null)
    {
        if (!$id_shop)
            $id_shop = Context::getContext()->shop->id;

        return Db::getInstance()->executeS('
			SELECT pa.*, CONCAT_WS(" ", emp.firstname, emp.lastname) as empleado
			FROM `'._DB_PREFIX_.'pos_arqueoscaja` pa INNER JOIN `'._DB_PREFIX_.'employee` emp
			on pa.id_employee_apertura = emp.id_employee
			WHERE `id_shop` = '.$id_shop.' AND estado = 1
			ORDER BY fecha_apertura DESC
		');
    }

    public static function cajaAbiertaJoinEmpleadoByEmployee($id_employee)
    {
        $id_shop = Context::getContext()->shop->id;

        return Db::getInstance()->executeS('
			SELECT pa.*, CONCAT_WS(" ", emp.firstname, emp.lastname) as empleado
			FROM `'._DB_PREFIX_.'pos_arqueoscaja` pa INNER JOIN `'._DB_PREFIX_.'employee` emp
			on pa.id_employee_apertura = emp.id_employee
			WHERE `id_shop` = '.$id_shop.' AND estado = 1 AND id_employee_apertura = '.$id_employee.'
			ORDER BY fecha_apertura DESC
		');
    }

    public static function cajaByID($id)
    {

        $id_shop = Context::getContext()->shop->id;

        return Db::getInstance()->getRow('
            SELECT pa.*, CONCAT_WS(" ", emp.firstname, emp.lastname) as empleado
			FROM `'._DB_PREFIX_.'pos_arqueoscaja` pa INNER JOIN `'._DB_PREFIX_.'employee` emp
			on pa.id_employee_apertura = emp.id_employee
			WHERE `id_shop` = '.$id_shop.' AND id_pos_arqueoscaja = '.$id.'
			ORDER BY fecha_apertura DESC
		');
    }

    public static function cajaAbierta($id)
    {

        $id_shop = Context::getContext()->shop->id;

        return Db::getInstance()->getRow('
			SELECT *
			FROM `'._DB_PREFIX_.'pos_arqueoscaja`
			WHERE `id_shop` = '.$id_shop.' AND estado = 1 AND id_pos_arqueoscaja = '.$id.'
			ORDER BY fecha_apertura DESC
		');
    }

    public static function existeCaja($id)
    {


        $id_shop = Context::getContext()->shop->id;

        return (bool)Db::getInstance()->getValue('
			SELECT id_pos_arqueoscaja
			FROM `'._DB_PREFIX_.'pos_arqueoscaja`
			WHERE `id_shop` = '.$id_shop.' AND estado = 1 AND id_pos_arqueoscaja = '.$id.'
			ORDER BY fecha_apertura DESC
		');

    }



    //para reportes

    public static function getAllByDates($id_tienda,$fecha_inicio, $fecha_fin, $id_employee = false)
    {

        $sql = 'SELECT t.* FROM `'._DB_PREFIX_.'pos_arqueoscaja` t 
        WHERE id_shop= ' .$id_tienda. ' 
        AND DATE(fecha_apertura) BETWEEN \''.$fecha_inicio.' 00:00:00\' AND \''.$fecha_fin.' 23:59:59\' 
        ' . ($id_employee > 0 ? ' AND id_employee_apertura = '.$id_employee:'').' ORDER BY fecha_apertura DESC';

//        d($sql);
        return Db::getInstance()->ExecuteS($sql);
    }

    public static function getAllCerradas($id_tienda,$fecha_inicio, $fecha_fin, $id_employee = false)
    {

        $sql = 'SELECT t.* FROM `'._DB_PREFIX_.'pos_arqueoscaja` t 
        WHERE id_shop= ' .$id_tienda. ' 
        AND DATE(fecha_cierre) BETWEEN \''.$fecha_inicio.'\' AND \''.$fecha_fin.'\' AND estado = 0 ORDER BY fecha_apertura DESC';

        return Db::getInstance()->ExecuteS($sql);
    }
}
