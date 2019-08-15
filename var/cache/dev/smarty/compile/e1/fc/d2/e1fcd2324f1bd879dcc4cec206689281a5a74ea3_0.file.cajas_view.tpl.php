<?php
/* Smarty version 3.1.33, created on 2019-08-13 16:46:06
  from 'C:\xampp\htdocs\siscitas\admincitas\themes\default\template\cajas_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d532f9e050a64_31282364',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1fcd2324f1bd879dcc4cec206689281a5a74ea3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\siscitas\\admincitas\\themes\\default\\template\\cajas_view.tpl',
      1 => 1565730317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d532f9e050a64_31282364 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
	.bo_search_form #toolbar_caja_dolares, #toolbar_caja_soles {
		border-top-left-radius: 0;
		border-top-right-radius: 55px;
		border-bottom-right-radius: 55px;
		border-bottom-left-radius: 0;
		color: #363a41;
		background: #fff;
		border: 1px solid #bbcdd2;
		border-left: none;
		font-style: italic;
		-webkit-box-shadow: none;
		box-shadow: none;
		-webkit-transition: none;
		transition: none;
	}
	.bo_search_form .form-group {
		width: 145px!important;
	}
	@media (max-width: 767px) {
		.bootstrap .bo_search_form {
			display: inline-flex !important;
		}
		#header_logo{
			display: none!important;
		}
		.bo_search_form .form-group {
			width: 20vh!important;
		}
	}

	#toolbar_caja_soles, #toolbar_caja_dolares{
		font-size: 1.7em;
		padding: 0px 5px;
	}
</style>
<?php $_smarty_tpl->_assignInScope('monto_caja_abierta', PosArqueoscaja::getCajaLast($_smarty_tpl->tpl_vars['shop']->value->id));?>
<form id="header_search" class="component bo_search_form toolbar_cajas_form form-inline">
	<?php if (!empty($_smarty_tpl->tpl_vars['monto_caja_abierta']->value) && $_smarty_tpl->tpl_vars['monto_caja_abierta']->value['estado'] == 1) {?>
	Caja Soles
	<div class="form-group div_soles">
		<span class="input-group">
			<span class="input-group-btn">
				<span class="btn btn-primary">
					<i id="search_type_icon" class="material-icons" style="top: -6px;">S/</i>
				</span>
			</span>
			<span id="toolbar_caja_soles" class="form-control"><?php echo $_smarty_tpl->tpl_vars['monto_caja_abierta']->value['monto_operaciones'];?>
</span>
		</span>
	</div>
	Caja Dolares
	<div class="form-group div_dolares">
		<span class="input-group">
			<span class="input-group-btn">
				<span class="btn btn-primary">
					<i id="search_type_icon" class="material-icons">attach_money</i>
				</span>
			</span>
			<span id="toolbar_caja_dolares" class="form-control"><?php echo $_smarty_tpl->tpl_vars['monto_caja_abierta']->value['monto_operaciones_dolares'];?>
</span>
		</span>
	</div>
	<?php }?>
</form>
<?php }
}
