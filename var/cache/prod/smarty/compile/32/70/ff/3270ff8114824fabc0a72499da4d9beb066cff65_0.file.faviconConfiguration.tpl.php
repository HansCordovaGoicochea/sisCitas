<?php
/* Smarty version 3.1.33, created on 2019-08-12 14:19:38
  from 'C:\xampp\htdocs\siscitas\modules\ps_faviconnotificationbo\views\templates\admin\tabs\faviconConfiguration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d51bbca8803d9_58018058',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3270ff8114824fabc0a72499da4d9beb066cff65' => 
    array (
      0 => 'C:\\xampp\\htdocs\\siscitas\\modules\\ps_faviconnotificationbo\\views\\templates\\admin\\tabs\\faviconConfiguration.tpl',
      1 => 1565637553,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d51bbca8803d9_58018058 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel col-lg-10 right-panel">
    <form method="post" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['moduleAdminLink']->value,'htmlall','UTF-8' ));?>
&page=faviconConfiguration" class="form-horizontal">
        <h3>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Configuration','d'=>'Admin.Global'),$_smarty_tpl ) );?>

        </h3>
        <div class="form-group row">
            <div class="title">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Display notifications in the browser tab for:','d'=>'Modules.Faviconnotificationbo.Admin'),$_smarty_tpl ) );?>

            </div>
            <ol>
                <div class="col-lg-5 col-md-4 col-xs-10">
                    <div class="form-group">
                        <div class="control-label col-lg-5 col-md-4 col-xs-10">
                            <label class="labelbutton"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'New orders','d'=>'Modules.Faviconnotificationbo.Admin'),$_smarty_tpl ) );?>
</label>
                        </div>
                        <div>
                            <div class="input-group fixed-width-lg">
                                <span class="switch prestashop-switch fixed-width-lg">
                                <input class="yes" type="radio" name="CHECKBOX_ORDER" id="checkbox_track_new_orders_on" value="1" <?php if ($_smarty_tpl->tpl_vars['bofavicon_params']->value['CHECKBOX_ORDER'] == 1) {?>checked="checked"<?php }?>>
                                <label for="checkbox_track_new_orders_on" class="radioCheck"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</label>
                                <input class="no" type="radio" name="CHECKBOX_ORDER" id="checkbox_track_new_orders_off" value="0" <?php if ($_smarty_tpl->tpl_vars['bofavicon_params']->value['CHECKBOX_ORDER'] == 0) {?>checked="checked"<?php }?>>
                                <label for="checkbox_track_new_orders_off" class="radioCheck"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</label>
                                <a class="slide-button btn"></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label col-lg-5 col-md-4 col-xs-10">
                            <label class="labelbutton"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'New customers','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
</label>
                        </div>
                        <div>
                            <div class="input-group fixed-width-lg">
                                <span class="switch prestashop-switch fixed-width-lg">
                                <input class="yes" type="radio" name="CHECKBOX_CUSTOMER" id="checkbox_track_new_customers_on" value="1" <?php if ($_smarty_tpl->tpl_vars['bofavicon_params']->value['CHECKBOX_CUSTOMER'] == 1) {?>checked="checked"<?php }?>>
                                <label for="checkbox_track_new_customers_on" class="radioCheck"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</label>
                                <input class="no" type="radio" name="CHECKBOX_CUSTOMER" id="checkbox_track_new_customers_off" value="0" <?php if ($_smarty_tpl->tpl_vars['bofavicon_params']->value['CHECKBOX_CUSTOMER'] == 0) {?>checked="checked"<?php }?>>
                                <label for="checkbox_track_new_customers_off" class="radioCheck"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</label>
                                <a class="slide-button btn"></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label col-lg-5 col-md-4 col-xs-10">
                            <label class="labelbutton"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'New messages','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</label>
                        </div>
                        <div>
                            <div class="input-group fixed-width-lg">
                                <span class="switch prestashop-switch fixed-width-lg">
                                <input class="yes" type="radio" name="CHECKBOX_MESSAGE" id="checkbox_track_new_messages_on" value="1" <?php if ($_smarty_tpl->tpl_vars['bofavicon_params']->value['CHECKBOX_MESSAGE'] == 1) {?>checked="checked"<?php }?>>
                                <label for="checkbox_track_new_messages_on" class="radioCheck"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</label>
                                <input class="no" type="radio" name="CHECKBOX_MESSAGE" id="checkbox_track_new_messages_off" value="0" <?php if ($_smarty_tpl->tpl_vars['bofavicon_params']->value['CHECKBOX_MESSAGE'] == 0) {?>checked="checked"<?php }?>>
                                <label for="checkbox_track_new_messages_off" class="radioCheck"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</label>
                                <a class="slide-button btn"></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </ol>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <div class="divcolorpicker control-label col-lg-6 col-md-4 col-xs-10">
                    <label class="labelbutton" for="faviconbo_input_backgroundcolor"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Notification background color','d'=>'Modules.Faviconnotificationbo.Admin'),$_smarty_tpl ) );?>
</label>
                </div>
                <div>
                    <div class="input-group fixed-width-lg">
                        <input id="BACKGROUND_COLOR_FAVICONBO" type="text" data-hex="true" class="mColorPickerFaviconInput" value="<?php if (isset($_smarty_tpl->tpl_vars['bofavicon_params']->value['BACKGROUND_COLOR_FAVICONBO'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['bofavicon_params']->value['BACKGROUND_COLOR_FAVICONBO'],'quotes' ));
}?>" name="BACKGROUND_COLOR_FAVICONBO"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="divcolorpicker control-label col-lg-6 col-md-4 col-xs-10">
                    <label class="labelbutton" for="faviconbo_input_textcolor"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Notification text color','d'=>'Modules.Faviconnotificationbo.Admin'),$_smarty_tpl ) );?>
</label>
                </div>
                <div>
                    <div class="input-group fixed-width-lg">
                        <input id="TEXT_COLOR_FAVICONBO" type="text" data-hex="true" class="mColorPickerFaviconInput" value="<?php if (isset($_smarty_tpl->tpl_vars['bofavicon_params']->value['TEXT_COLOR_FAVICONBO'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['bofavicon_params']->value['TEXT_COLOR_FAVICONBO'],'quotes' ));
}?>" name="TEXT_COLOR_FAVICONBO"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit" value="1" id="module_form_submit_btn" name="submitFavIconConf" class="btn btn-default pull-right"><i class="process-icon-save"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
</button>
        </div>
    </form>
</div>
<?php }
}
