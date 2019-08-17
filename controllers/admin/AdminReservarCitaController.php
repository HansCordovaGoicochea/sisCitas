<?php

class AdminReservarCitaControllerCore extends AdminController
{

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
            'estado_caja' => array('title' => $this->l('Estado'), 'align' => 'center', 'class' => 'fixed-width-sm', ),
        );

        $nombre_access = Profile::getProfile($this->context->employee->id_profile);
        if (isset($nombre_access['name']) && $nombre_access['name'] == "Cajero"){
            $this->_where .= ' and a.id_employee_apertura = '.(int)$this->context->employee->id;
//          $this->_where .= 'AND tipo_documento_electronico in ("Boleta", "Factura") or current_state not in (2, 6) ';
        }

        $this->_orderBy = 'fecha_apertura';
        $this->_orderWay = 'DESC';

        $this->context->smarty->assign(array('icon' => 'icon-inbox'));
        $this->context->smarty->assign(array('iconosubmenu' => 'icon-inbox'));
        
    }

    /**
     * Fetch the template for action enable
     *
     * @param string $token
     * @param int $id
     * @param int $value state enabled or not
     * @param string $active status
     * @param int $id_category
     * @param int $id_product
     */
    public function displayEnableLink($token, $id, $value, $active, $id_category = null, $id_product = null)
    {
        $obj = new PosArqueoscaja((int)$id);
        if ($obj->estado == 1){
            return false;
        }
        $tpl_enable = $this->context->smarty->createTemplate('helpers/list/list_action_enable.tpl');
        $tpl_enable->assign(array(
            'enabled' => (bool)$value,
            'url_enable' => self::$currentIndex.'&'.$this->identifier.'='.(int)$id.'&'.$active.$this->table.'&token='.($token != null ? $token : $this->token),
            'confirm' => isset($confirm) ? $confirm : null,
        ));

        return $tpl_enable->fetch();
    }


    public function processStatus()
    {

        if (Validate::isLoadedObject($object = $this->loadObject())) {
            if (!$object->estado_cuenta_mayor) {
                //case where active will be false after parent::toggleStatus()
                $object->estado_cuenta_mayor = 1;
                $object->id_employee_cuentamayor = Context::getContext()->employee->id;
                $object->update();
            }
        } else {
            $this->errors[] = $this->trans('An error occurred while updating the status for an object.', array(), 'Admin.Notifications.Error')
                .' <b>'.$this->table.'</b> '.$this->trans('(cannot load object)', array(), 'Admin.Notifications.Error');
        }
        return true;
    }

    public function initToolbar()
    {
        parent::initToolbar();

        unset($this->toolbar_btn['new']);

    }

    public function setMedia()
    {
        parent::setMedia();

        $this->addCSS(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/css/datatables.min.css');
        $this->addJs(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/js/datatables.min.js');

        $this->addCSS(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/css/waitMe.min.css');
        $this->addJs(__PS_BASE_URI__ . $this->admin_webpath . '/themes/default/js/waitMe.min.js');

    }

    public function renderForm()
    {
        if (!($obj = $this->loadObject(true)))
            return;

        Tools::redirectAdmin(self::$currentIndex.'&token='.$this->token);

        return parent::renderForm();
    }

    public function getList($id_lang, $orderBy = null, $orderWay = null, $start = 0, $limit = null, $id_lang_shop = null)
    {
        parent::getList($id_lang, $orderBy, $orderWay, $start, $limit, $id_lang_shop);

        if ($this->_list) {
            foreach ($this->_list as &$row) {
                if ((int)$row['estado'] == 1){
                    $row['class'] =  "success"; // verde
                }
                elseif ((int)$row['estado'] == 0){
                    $row['class'] =  "danger"; // rojo
                }
            }
//            d($this->_list);

//            uasort ($this->_list, function ($left, $right) {
//                if($left['estado'] === $right['estado']) {
//                    return 0;
//                }
//                return $left['estado'] > $right['estado'] ? -1 : 1;
//            });
        }
    }


}