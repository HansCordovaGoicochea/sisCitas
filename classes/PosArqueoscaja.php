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
    public static function getCajaLast($id_shop)
    {

        return Db::getInstance()->getRow('
			SELECT *
			FROM `'._DB_PREFIX_.'pos_arqueoscaja`
			WHERE estado = 1 AND `id_shop` = '.$id_shop.' AND id_employee_apertura = '.Context::getContext()->employee->id.'
			ORDER BY fecha_apertura DESC
		');

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

}
