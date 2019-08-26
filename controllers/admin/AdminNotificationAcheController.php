<?php

class AdminNotificationAcheController extends AdminController{

    protected $types;

    public function __construct()
    {
        $this->bootstrap = true;
        $this->context = Context::getContext();
        parent::__construct();


        $this->types = array('citas', 'cumples');
    }

    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme);

    }

    public function ajaxProcessGetNotificationAche()
    {

//        $return['header_notification'] = $this->renderHeaderNotification();
        $return = $this->renderHeaderNotification();

        die (json_encode($return));


    }

    public function renderHeaderNotification()
    {
        $notifications = array();
        foreach ($this->types as $type) {
            $notifications[$type] = $this->getN($type);
        }

        return $notifications;
//        $this->context->smarty->assign(array(
//            'link' => $this->context->link,
//            'notifications' => $notifications,
//            'total' => (int)$notifications['citas']['total'] + (int)$notifications['cumples']['total'],
//        ));



//        $tpl_enable = $this->context->smarty->fetch('controllers/notification_ache/notification_ache.tpl');
//
//        return $tpl_enable;


    }

    protected function getN($type){
        switch ($type) {
            case 'citas':
                $sql = '
					SELECT SQL_CALC_FOUND_ROWS rc.`id_reservar_cita`, rc.`id_colaborador`, rc.`id_customer`, rc.`product_name`, CONCAT_WS(" ", e.firstname, e.lastname) as colaborador, c.firstname as cliente, fecha_inicio as fecha, hora
					FROM `'._DB_PREFIX_.'reservar_cita` as rc
					LEFT JOIN `'._DB_PREFIX_.'customer` as c ON (c.`id_customer` = rc.`id_customer`)
					LEFT JOIN `'._DB_PREFIX_.'employee` as e ON (e.`id_employee` = rc.`id_colaborador`)
					WHERE `estado_actual` = 0 AND  DATE_SUB(CURDATE(), INTERVAL -1 DAY) >= DATE(fecha_inicio) AND CURDATE() <= DATE(fecha_inicio)'.
                    Shop::addSqlRestriction(false, 'rc').'
					ORDER BY `fecha_inicio` ASC
					LIMIT 10';
                break;
            case 'cumples':
                $sql = '
					SELECT SQL_CALC_FOUND_ROWS DISTINCT cli.id_customer, cli.firstname as cliente, cli.birthday as fecha
                    FROM tm_customer AS cli
                    WHERE cli.is_guest = 0
                        AND cli.active = 1
                        AND MONTH(cli.birthday) = EXTRACT(MONTH FROM CURDATE())
                        AND DAY(cli.birthday) = EXTRACT(DAY FROM CURDATE())
                    '.
                    Shop::addSqlRestriction(false, 'cli').'
					ORDER BY `birthday` ASC
					LIMIT 10';

                break;
        }


        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql, true, false);
        $total = Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('SELECT FOUND_ROWS()', false);
        $json = array('total' => $total, 'results' => array());
        foreach ($result as $value) {
            $customerName = $value['cliente'];

            $json['results'][] = array(
                'id_reservar_cita' => ((!empty($value['id_reservar_cita'])) ? (int) $value['id_reservar_cita'] : 0),
                'id_customer' => ((!empty($value['id_customer'])) ? (int) $value['id_customer'] : 0),
                'colaborador' => ((!empty($value['colaborador'])) ? Tools::displayDate($value['colaborador']) : 0),
                'fecha' => isset($value['fecha']) ? Tools::displayDate($value['fecha']) : 0,
                'hora' => ((!empty($value['hora'])) ? Tools::safeOutput($value['hora']) : ''),
                'product_name' => ((!empty($value['product_name'])) ? Tools::safeOutput($value['product_name']) : ''),
                'customer_name' => $customerName,
            );
        }

        return $json;
    }

}
