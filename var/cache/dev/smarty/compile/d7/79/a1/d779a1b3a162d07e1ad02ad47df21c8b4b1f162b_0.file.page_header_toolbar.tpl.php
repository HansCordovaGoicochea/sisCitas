<?php
/* Smarty version 3.1.33, created on 2019-08-13 16:46:05
  from 'C:\xampp\htdocs\siscitas\admincitas\themes\default\template\page_header_toolbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d532f9dd9ede8_68244529',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd779a1b3a162d07e1ad02ad47df21c8b4b1f162b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\siscitas\\admincitas\\themes\\default\\template\\page_header_toolbar.tpl',
      1 => 1565729926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d532f9dd9ede8_68244529 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php if (!isset($_smarty_tpl->tpl_vars['title']->value) && isset($_smarty_tpl->tpl_vars['page_header_toolbar_title']->value)) {?>
  <?php $_smarty_tpl->_assignInScope('title', $_smarty_tpl->tpl_vars['page_header_toolbar_title']->value);
}
if (isset($_smarty_tpl->tpl_vars['page_header_toolbar_btn']->value)) {?>
  <?php $_smarty_tpl->_assignInScope('toolbar_btn', $_smarty_tpl->tpl_vars['page_header_toolbar_btn']->value);
}?>

<div class="bootstrap">
  <div class="page-head <?php if (isset($_smarty_tpl->tpl_vars['current_tab_level']->value) && $_smarty_tpl->tpl_vars['current_tab_level']->value == 3) {?>with-tabs<?php }?>">
    <div class="wrapper clearfix">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10388828765d532f9dcfacc1_79566244', 'pageBreadcrumb');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7690628255d532f9dd16243_77320152', 'pageTitle');
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6703736235d532f9dd21dc7_75020670', 'toolbarBox');
?>


    </div>

    <?php if (isset($_smarty_tpl->tpl_vars['current_tab_level']->value) && $_smarty_tpl->tpl_vars['current_tab_level']->value == 3) {?>
      <div class="page-head-tabs" id="head_tabs">
        <ul class="nav">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabs']->value, 'level_1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['level_1']->value) {
?>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['level_1']->value['sub_tabs'], 'level_2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['level_2']->value) {
?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['level_2']->value['sub_tabs'], 'level_3');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['level_3']->value) {
?>
              <?php if ($_smarty_tpl->tpl_vars['level_3']->value['current']) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['level_3']->value['sub_tabs'], 'level_4');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['level_4']->value) {
?>
                  <?php if ($_smarty_tpl->tpl_vars['level_4']->value['active']) {?>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['level_4']->value['href'];?>
" id="subtab-<?php echo $_smarty_tpl->tpl_vars['level_4']->value['class_name'];?>
" <?php if ($_smarty_tpl->tpl_vars['level_4']->value['current']) {?>class="current"<?php }?> data-submenu="<?php echo $_smarty_tpl->tpl_vars['level_4']->value['id_tab'];?>
"><?php echo $_smarty_tpl->tpl_vars['level_4']->value['name'];?>
</a>
                    </li>
                  <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
      </div>
    <?php }?>
  </div>
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayDashboardTop'),$_smarty_tpl ) );?>

</div>
<?php }
/* {block 'pageBreadcrumb'} */
class Block_10388828765d532f9dcfacc1_79566244 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'pageBreadcrumb' => 
  array (
    0 => 'Block_10388828765d532f9dcfacc1_79566244',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <ul class="breadcrumb page-breadcrumb">
                <?php if ($_smarty_tpl->tpl_vars['breadcrumbs2']->value['container']['name'] != '') {?>
          <li class="breadcrumb-container">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['breadcrumbs2']->value['container']['name'] ));?>

          </li>
        <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['breadcrumbs2']->value['tab']['name'] != '' && $_smarty_tpl->tpl_vars['breadcrumbs2']->value['container']['name'] != $_smarty_tpl->tpl_vars['breadcrumbs2']->value['tab']['name']) {?>
          <li class="breadcrumb-current">
            <?php if ($_smarty_tpl->tpl_vars['breadcrumbs2']->value['tab']['href'] != '') {?><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['breadcrumbs2']->value['tab']['href'] ));?>
"><?php }?>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['breadcrumbs2']->value['tab']['name'] ));?>

              <?php if ($_smarty_tpl->tpl_vars['breadcrumbs2']->value['tab']['href'] != '') {?></a><?php }?>
          </li>
        <?php }?>

                      </ul>
    <?php
}
}
/* {/block 'pageBreadcrumb'} */
/* {block 'pageTitle'} */
class Block_7690628255d532f9dd16243_77320152 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'pageTitle' => 
  array (
    0 => 'Block_7690628255d532f9dd16243_77320152',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <h1 class="page-title">
                <?php if (is_array($_smarty_tpl->tpl_vars['title']->value)) {
echo preg_replace('!<[^>]*?>!', ' ', end($_smarty_tpl->tpl_vars['title']->value));
} else {
echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['title']->value);
}?>
      </h1>
    <?php
}
}
/* {/block 'pageTitle'} */
/* {block 'toolbarBox'} */
class Block_6703736235d532f9dd21dc7_75020670 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'toolbarBox' => 
  array (
    0 => 'Block_6703736235d532f9dd21dc7_75020670',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <div class="page-bar toolbarBox">
        <div class="btn-toolbar">
          <a href="#" class="toolbar_btn dropdown-toolbar navbar-toggle" data-toggle="collapse"
             data-target="#toolbar-nav"><i class="process-icon-dropdown"></i>
            <div><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Menu','d'=>'Admin.Navigation.Menu'),$_smarty_tpl ) );?>
</div>
          </a>
          <ul id="toolbar-nav" class="nav nav-pills pull-right collapse navbar-collapse">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayDashboardToolbarTopMenu'),$_smarty_tpl ) );?>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['toolbar_btn']->value, 'btn', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['btn']->value) {
?>
              <?php if ($_smarty_tpl->tpl_vars['k']->value != 'back' && $_smarty_tpl->tpl_vars['k']->value != 'modules-list') {?>
                <li>
                  <a id="page-header-desc-<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
-<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['imgclass'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn']->value['imgclass'] ));
} else {
echo $_smarty_tpl->tpl_vars['k']->value;
}?>"
                     class="toolbar_btn <?php if (isset($_smarty_tpl->tpl_vars['btn']->value['target']) && $_smarty_tpl->tpl_vars['btn']->value['target']) {?> _blank<?php }?> pointer"<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['href'])) {?> href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn']->value['href'] ));?>
"<?php }?>
                     title="<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['help'])) {
echo $_smarty_tpl->tpl_vars['btn']->value['help'];
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn']->value['desc'] ));
}?>"<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['js']) && $_smarty_tpl->tpl_vars['btn']->value['js']) {?> onclick="<?php echo $_smarty_tpl->tpl_vars['btn']->value['js'];?>
"<?php }
if (isset($_smarty_tpl->tpl_vars['btn']->value['modal_target']) && $_smarty_tpl->tpl_vars['btn']->value['modal_target']) {?> data-target="<?php echo $_smarty_tpl->tpl_vars['btn']->value['modal_target'];?>
" data-toggle="modal"<?php }
if (isset($_smarty_tpl->tpl_vars['btn']->value['help'])) {?> data-toggle="tooltip" data-placement="bottom"<?php }?>>
                    <i
                      class="<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['icon'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn']->value['icon'] ));
} else { ?>process-icon-<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['imgclass'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn']->value['imgclass'] ));
} else {
echo $_smarty_tpl->tpl_vars['k']->value;
}
}
if (isset($_smarty_tpl->tpl_vars['btn']->value['class'])) {?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn']->value['class'] ));
}?>"></i>
                    <div<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['force_desc']) && $_smarty_tpl->tpl_vars['btn']->value['force_desc'] == true) {?> class="locked"<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['btn']->value['desc'] ));?>
</div>
                  </a>
                </li>
              <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

              <?php if ($_GET['controller'] == 'AdminOrders' && Tools::getValue('id_order')) {?>
                  <li class="hidden-xs" style="text-align: center!important;">
                      <div  class="" >
                          <div class="box-stats color4" style=" height: 0px!important;">
                              <div class="kpi-content" style="display: inline-flex!important;">
                                  <span class="title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</span>
                                  <span class="value" style="font-weight: bold!important; font-size: 3em!important; color: #121475!important;;" id="total_ache_order"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl,'currency'=>1),$_smarty_tpl ) );?>
</span>
                              </div>
                          </div>
                      </div>
                  </li>
              <?php }?>
          </ul>
          <?php if ((isset($_smarty_tpl->tpl_vars['tab_modules_open']->value) && $_smarty_tpl->tpl_vars['tab_modules_open']->value) || isset($_smarty_tpl->tpl_vars['tab_modules_list']->value)) {?>
            <?php echo '<script'; ?>
 type="text/javascript">
              //<![CDATA[
              var modules_list_loaded = false;
              <?php if (isset($_smarty_tpl->tpl_vars['tab_modules_open']->value) && $_smarty_tpl->tpl_vars['tab_modules_open']->value) {?>
              $(function () {
                $('#modules_list_container').modal('show');
                openModulesList();

              });
              <?php }?>
              <?php if (isset($_smarty_tpl->tpl_vars['tab_modules_list']->value)) {?>
              $('.process-icon-modules-list').parent('a').unbind().bind('click', function (event) {
                event.preventDefault();
                $('#modules_list_container').modal('show');
                openModulesList();
              });
              <?php }?>
              //]]>
            <?php echo '</script'; ?>
>
          <?php }?>
        </div>
      </div>
    <?php
}
}
/* {/block 'toolbarBox'} */
}
