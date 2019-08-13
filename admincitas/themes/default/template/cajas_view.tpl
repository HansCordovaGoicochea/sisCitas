{**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<style>
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
{assign var="monto_caja_abierta" value=PosArqueoscaja::getCajaLast($shop->id)}
{*{d($monto_caja_abierta)}*}
<form id="header_search" class="component bo_search_form toolbar_cajas_form form-inline">
	{if !empty($monto_caja_abierta) && $monto_caja_abierta['estado'] == 1}
	Caja Soles
	<div class="form-group div_soles">
		<span class="input-group">
			<span class="input-group-btn">
				<span class="btn btn-primary">
					<i id="search_type_icon" class="material-icons" style="top: -6px;">S/</i>
				</span>
			</span>
			<span id="toolbar_caja_soles" class="form-control">{$monto_caja_abierta['monto_operaciones']}</span>
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
			<span id="toolbar_caja_dolares" class="form-control">{$monto_caja_abierta['monto_operaciones_dolares']}</span>
		</span>
	</div>
	{/if}
</form>
