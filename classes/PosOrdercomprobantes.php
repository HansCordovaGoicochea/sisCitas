<?php

class PosOrdercomprobantesCore extends ObjectModel
{

    public $id_order;

    //datos facturacion electronica
    public $tipo_documento_electronico;
    public $numero_comprobante;
    public $hash_cpe;
    public $ruta_xml;
    public $hash_cdr;
    public $ruta_cdr;
    public $cod_sunat;
    public $msj_sunat;
    public $ruta_ticket;
    public $ruta_pdf_a4;

    public $nota_baja;
    public $numeracion_nota_baja;
    public $motivo_baja;
    public $mensaje_cdr;

    public $code_motivo_nota_credito;

    public $valor_qr_nota;
    public $ruta_pdf_a4nota;
    public $identificador_comunicacion;

    public $devolver_monto_caja; //1 DEVUELTO 0 NO DEVUELTO

    public $sub_total;
    public $impuesto;
    public $total;

    public $date_add;
    public $date_upd;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'pos_ordercomprobantes',
        'primary' => 'id_pos_ordercomprobantes',
        'fields' => array(
            'id_order' => array('type' => self::TYPE_INT),

            //datos facturacion electronica
            'tipo_documento_electronico' => array('type' => self::TYPE_STRING),
            'numero_comprobante' => array('type' => self::TYPE_STRING),
            'hash_cpe' => array('type' => self::TYPE_STRING),
            'ruta_xml' => array('type' => self::TYPE_STRING),
            'hash_cdr' => array('type' => self::TYPE_STRING),
            'ruta_cdr' => array('type' => self::TYPE_STRING),
            'cod_sunat' => array('type' => self::TYPE_INT),
            'msj_sunat' => array('type' => self::TYPE_STRING),
            'ruta_ticket' => array('type' => self::TYPE_STRING),
            'ruta_pdf_a4' => array('type' => self::TYPE_STRING),

            'nota_baja' => array('type' => self::TYPE_STRING),
            'numeracion_nota_baja' => array('type' => self::TYPE_STRING),
            'motivo_baja' => array('type' => self::TYPE_STRING),
            'mensaje_cdr' => array('type' => self::TYPE_STRING),

            'code_motivo_nota_credito' => array('type' => self::TYPE_INT),

            'valor_qr_nota' => array('type' => self::TYPE_STRING),
            'ruta_pdf_a4nota' => array('type' => self::TYPE_STRING),
            'identificador_comunicacion' => array('type' => self::TYPE_STRING),

            'devolver_monto_caja' => array('type' => self::TYPE_BOOL), //1 DEVUELTO 0 NO DEVUELTO
            'sub_total' => array('type' => self::TYPE_FLOAT),
            'impuesto' => array('type' => self::TYPE_FLOAT),
            'total' => array('type' => self::TYPE_FLOAT),

            'date_add' => array('type' => self::TYPE_DATE),
            'date_upd' => array('type' => self::TYPE_DATE),
        ),
    );


    public static function getComprobantesByOrder($id_order)
    {

        return Db::getInstance()->executeS('
			SELECT *
			FROM `'._DB_PREFIX_.'pos_ordercomprobantes`
			WHERE `id_order` = '.$id_order.'
			ORDER BY 1 ASC
		');

    }
    public static function getComprobantesByOrderLimit($id_order)
    {

        return Db::getInstance()->getRow('
			SELECT *
			FROM `'._DB_PREFIX_.'pos_ordercomprobantes`
			WHERE `id_order` = '.$id_order.'
			ORDER BY 1 DESC
		');

    }

}
