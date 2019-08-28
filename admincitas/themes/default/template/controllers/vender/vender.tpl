<link rel="stylesheet" href="{$tpl_folder}css/vender.css">
<link rel="stylesheet" href="{$tpl_folder}css/loader.css">
<link rel="stylesheet" href="{$tpl_folder}css/content-visibility.css">
<link rel="stylesheet" href="{$tpl_folder}css/miniarrow.css">

<script>
    const url_ajax_vender = "{$link->getAdminLink('AdminVender')|addslashes}";
    const token_vender = "{getAdminToken tab='AdminVender'}";
    const perfil_empleado = '{$perfil_empleado}'

    {if isset($es_cotizacion) && (bool)$es_cotizacion}
        var es_cotizacion = '{(bool)$es_cotizacion}';
        var array_detail = {$array_detail|@json_encode};
        var id_cart = '{Tools::getValue('id_cart')}';
        {else}
        var id_cart = 0;
        var es_cotizacion = false;
    {/if}
</script>
<br>

<div id="app_vender">
    <!-- Preloader and it's background. -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="content-area">
        <div class="row-group">
            <div class="content-row">
{*                <div id="left-panel" class="pos-content payment_div col-sm-12 col-md-5 col-lg-6 col-xl-6">*}
                <div id="left-panel" class="pos-content payment_div col-sm-12 col-md-5 ">
                    <!-- Tab nav -->
                    <ul class="nav nav-tabs" id="tabProductosCliente" :class="order.id ? 'disabled-pointer-events-ache':''">
                        <li class="nav-item active" @click="activeTabPago(false);" :disabled="order.id">
                            <a href="#productos">
                                <i class="fa fa-cart-plus fa-lg" aria-hidden="true"></i>
                                {l s='Productos' d='Admin.Global'}
                            </a>
                        </li>

                        <li class="nav-item" @click="activeTabPago(true);">
                            <a href="#pagos" :class="cart.length == 0 ? 'disabled':''" v-if="perfil_empleado_vue != 'Vendedor'">
                                <i class="fa fa-money fa-lg" aria-hidden="true"></i>
                                {l s='Pagos' d='Admin.Orderscustomers.Feature'}
                                /
                                <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                                {l s='Cliente' d='Admin.Orderscustomers.Feature'}
                            </a>
                            <a href="#pagos" :class="cart.length == 0 ? 'disabled':''" v-else>
                                <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                                {l s='Cliente' d='Admin.Orderscustomers.Feature'}
                            </a>
                        </li>
                    </ul>
                    <!-- Tab content -->
                    <div class="tab-content">
                        <!-- Tab productos -->
                        <div class="tab-pane active" id="productos">
                            <span class="pull-right" style=" font-weight: bold; margin-right: 4%;">Cod. Barras</span>
                            <div class="input-group col-xs-12 input-group-lg">
                                <span class="input-group-addon" id="helpId">
                                    <i class="icon-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Buscar producto" v-model="search" ref="search" @keyup.prevent="keyUpSearch($event)">
                                <span class="input-group-addon" style="padding: 0px; ">
                                <span class="switch prestashop-switch fixed-width-md" style="margin-top: 0px; ">
                                    <input type="radio" name="search_cod_barras" id="search_cod_barras_on" value="1"  v-model="active_codigo_barras">
                                    <label for="search_cod_barras_on" class="radioCheck">Sí</label>
                                     <input type="radio" name="search_cod_barras" id="search_cod_barras_off" value="0" v-model="active_codigo_barras">
                                    <label for="search_cod_barras_off" class="radioCheck">No</label>
                                    <a class="slide-button btn"></a>
                                </span>
                        </span>
                            </div>
                            <div class="row content_table_scroll" @scroll="infiniteScroll" ref="div_scroll">
                                <table class="table table-clean mt-2 mb-3 table_list_products" id="table_list_products">
                                    <tbody>
{*                                    <tr v-for="(prod, ind) in products" :key="'ind-' + ind" v-bind:class = '{ "danger stock_min": prod.low_stock_threshold >= prod.quantity}' v-tooltip:top="prod.low_stock_threshold >= prod.quantity?'Stock por agotarse':''" @click="addItem(prod, ind)">*}
                                    <tr v-for="(prod, ind) in products" :key="'ind-' + ind" v-bind:class = '{ "danger stock_min": prod.low_stock_threshold >= prod.quantity}' @click="addItem(prod, ind)">
                                        <td width="5%" style="position: relative;">
                                            <i id="warningstock" class="material-icons" v-if="prod.low_stock_threshold >= prod.quantity" >warning</i>
                                            <img v-if="prod.link_rewrite_img" v-bind:src="prod.link_rewrite_img" class="imgm" :title="prod.name"/>
                                        </td>
                                        <td>
                                            <span v-text="prod.name"></span><br>
                                            <span class="text-black-50" style="font-size: 90%;" v-text="prod.reference"></span>
                                            <span v-if="prod.reference && prod.manufacturer_name">&nbsp;-&nbsp;</span>
                                            <span class="text-black-50" style="font-size: 90%;" v-if="prod.manufacturer_name" v-text="prod.manufacturer_name"></span>
                                        </td>
                                        <td class="text-center" >
                                            <span :inner-html.prop="prod.quantity | num_entero"></span>
                                        </td>
                                        <td class="text-center price">
                                            <span itemprop="price"  :inner-html.prop="prod.price_tax_incl | moneda_ache"></span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="loader_search" style="display: none;"><p><i class="fa fa-spinner fa-spin fa-3x"></i>Cargando Productos......</p> </div>
                            </div>
                            <div class="text-center" v-text="'Mostrando '+ pagination.items_shown_to +' de '+ pagination.total_items +' producto(s)'" v-if="pagination.should_be_displayed"></div>
                        </div>
                        <!-- Tab pagos -->
                        <div class="tab-pane" id="pagos">
                           <div class="mt-4 invoices-container">
                                {*duplicar este div si se necesita otro pago*}
                               <div>
                                   <div class="mb-4 collapse show">
                                        <div class="card">
                                            <div class="card-body">
                                                <div v-if="mostrar_adventencia" role="alert" class="alert alert-danger mb-4">
{*                                                    <div data-v-ecb82c18="">&nbsp; Una FACTURA debe tener un cliente</div>*}
{*                                                    <div data-v-ecb82c18="">&nbsp; Debe indicar un cliente con RUC</div>*}
{*                                                    <div data-v-ecb82c18="">&nbsp; Debe indicar una direccion para el cliente.</div>*}
                                                    <div v-for="(val, index) in msg_errores" v-html="val.msg"></div>
                                                </div>
                                                <div v-if="perfil_empleado_vue != 'Vendedor'">
                                                    <div class="row mb-4" v-if="!hasComprobante">
                                                        <div class="col-xs-6 col-lg-6 col-xl-6 text-center mb-3">
                                                            <a href="javascript:void(0)" class="card-link" @click="activarComprobante('Boleta')">
                                                                <i class="fa fa-file fa-lg"></i>&nbsp;&nbsp;Boleta
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-6 col-md-6 col-lg-6 col-xl-6 text-center" @click="activarComprobante('Factura')">
                                                            <a href="javascript:void(0)" class="card-link">
                                                                <i class="fa fa-file fa-lg"></i>&nbsp;&nbsp;Factura
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div v-if="hasComprobante" class="row required mb-4">
                                                        <div class="col-xs-4 col-lg-4 col-xl-4 col-sm-4" v-if="!numero_comprobante">
                                                            <i class="fa fa-file fa-lg"></i>&nbsp;&nbsp;
                                                            <strong v-text="tipo_comprobante"></strong> {if !(bool)$existeCertificado}<strong v-if="tipo_comprobante == 'Boleta'">N°:{$numeracion_doc_boleta['correlativo']+1}</strong><strong v-if="tipo_comprobante == 'Factura'">N°: {$numeracion_doc_factura['correlativo']+1}</strong>{/if}

                                                        </div>
                                                        <div class="col-xs-4 col-lg-4 col-xl-4 col-sm-4" v-else>
                                                            <a class="card-link" href="javascript:void(0)">
                                                                <i class="fa fa-print fa-lg"></i>
                                                                <strong v-text="tipo_comprobante"></strong> <span v-text="numero_comprobante"></span>
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-8 col-lg-8 col-xl-8 col-sm-8 text-right" >
                                                            <span :inner-html.prop="total | moneda_ache"></span>
                                                            <a href="javascript:void(0)" class="ml-3" @click="activarComprobante('Eliminar')" v-if="!numero_comprobante">
                                                                <small >Eliminar</small>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="card-text">
                                                        <div>
                                                            <div class="d-inline-block pull-left">
                                                                <strong>Pago</strong>&nbsp;&nbsp;
                                                            </div>
                                                            <div class="my-3 sales-add-edit-payments" v-for="(pago, ind) in pagos" :key="'ind-' + ind">
                                                                <div class="input-group">
                                                                    <select  id="inputPaymentMethod" class="custom-select form-control" v-model.number="pago.id_metodo_pago" @change="changeMetodoPago($event, pago)">
                                                                        <option data-tipo="efectivo" value="0">Efectivo</option>
                                                                        {foreach $cuentas as $cuenta}
                                                                            <option data-tipo="cuenta" value="{$cuenta.id_pos_cuentasbanco}">{$cuenta.nombre_tarjeta}</option>
                                                                        {/foreach}
                                                                    </select>
                                                                    <div class="mx-datepicker">
                                                                        <datepicker v-model="pago.fecha"></datepicker>
                                                                    </div>
                                                                    <span class="input-group-text" style="border-radius: 0px; margin-right: -1px;">S/</span>
                                                                    <input type="number" id="inputCash" placeholder="0.00" class="form-control text-center" v-model.number="pago.monto">
                                                                    <div v-if="pagos.length > 1 && ind > 0" class="input-group-append">
                                                                        <button type="button" class="btn btn-sm btn-primary" @click="borrarPago(pago)">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

{*                                                            <div class="d-inline-block">*}
{*                                                                *}{* boton para agregar otro pago *}
{*                                                                <a href="javascript:void(0)" @click="addPayment()">*}
{*                                                                    <small><i class="icon-plus"></i></small> Pago*}
{*                                                                </a>*}
{*                                                            </div>*}
                                                            <div class="mt-3">
                                                                {* calcular la deuda con todos los pagos *}
                                                                <div class="pull-right" :inner-html.prop="deudaItem | moneda_ache">S/</div>
                                                                <div class="d-inline-block pull-right">
                                                                    <strong v-text="textDeudaVuelto">Deuda</strong>&nbsp;&nbsp;
                                                                </div>
                                                            </div>
                                                            <div class="mt-3" v-if="monto_deuda > 0">
                                                                <div class="d-inline-block">
                                                                    <strong>Fecha Proximo pago</strong>&nbsp;&nbsp;
                                                                </div>
                                                                <datepicker v-model="fecha_proximo_pago"></datepicker>
                                                            </div>
                                                            <div class="mt-3">
                                                                <div class="d-inline-block">
                                                                    <strong># Guía de remisión:</strong>&nbsp;&nbsp;
                                                                </div>
                                                                <input type="text" class="form-control" v-model="nro_guia_remision"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <p class="card-text">
                                                    <strong>Cliente</strong>
                                                    <div>
                                                        <div>
                                                            <div class="v-autocomplete">
                                                                <div class="input-group mb-2" style="width: 98%">
                                                                    <input type="text" maxlength="11" id="clientes_search" ref="cliente" class="clientes_search form-control" v-model="cliente" :disabled="id_customer != 1" placeholder="Buscar por Número de documento" onkeyup="$(this).val().length >= 8 && $(this).val().length <= 11 ? $('#buscar_sunat').removeAttr('disabled') : $('#buscar_sunat').attr('disabled', 'disabled');" onkeypress="isNumberKey(event)" @keyup.enter="triggerBuscarSunat">
                                                                    <div id="buscar_sunat" class="input-group-addon btn btn-warning pointer" v-if="id_customer == 1" @click="buscarCliente()" disabled ref="enterBuscarSunat">
                                                                        <img src="{$img_dir}sunat.png" style="width: 14px; height: auto;" alt="" >&nbsp; Buscar Sunat
                                                                    </div>
                                                                    <div class="input-group-append" style="margin-left: 0px;" v-else>
                                                                        <button type="button" class="btn btn-sm btn-primary" style="border-top-right-radius: 3px; border-bottom-right-radius: 3px;" @click="borrarCliente()">
                                                                            <i class="fa fa-ban"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-if="id_customer != 1 || mostrar_form_cliente">
                                                            <div  class="form-group row required mt-3" >
                                                                <div  class="col-sm-4">
                                                                    <i class="fa fa-user"></i>&nbsp;<strong>Nombre</strong>
                                                                </div>
                                                                <input type="text" class="col-sm-8 form-control" v-model="nombre_legal" :disabled="!mostrar_form_cliente" @keyup="verificarCliente">
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-4">
                                                                    <i class="fa fa-credit-card"></i>&nbsp;
                                                                    <strong v-if="tipo_doc" v-text="tipo_doc">tipo documento</strong>
                                                                    <strong v-else>N° Documento</strong>
                                                                </div>
                                                                <input type="number" class="col-sm-8 form-control" v-model="numero_doc" disabled>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-4">
                                                                    <i class="fa fa-map-marker"></i>&nbsp;<strong>Dirección</strong>
                                                                </div>
                                                                <input type="text" class="col-sm-8 form-control" v-model="direccion_cliente">
                                                            </div>
                                                            <div class="form-group row" v-if="show_forma_pago">
                                                                <div class="col-sm-4">
                                                                    <i class="fa fa-money"></i>&nbsp;<strong>Forma de Pago</strong>
                                                                </div>
                                                                <div class="col-xs-12">
                                                                      <span class="switch prestashop-switch fixed-width-xxl">
                                                                        <input type="radio" name="es_credito" id="es_credito_off" value="0" checked v-model="es_credito">
                                                                        <label for="es_credito_off">Contado</label>
                                                                        <input type="radio" name="es_credito" id="es_credito_on" value="1" v-model="es_credito">
                                                                        <label for="es_credito_on">Crédito</label>
                                                                        <a class="slide-button btn"></a>
                                                                      </span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                   </div>
                               </div>
                                {*  fin div duplicado*}
                           </div>
                        </div>
                    </div>
                </div>
{*                <div id="right-panel" class="pos-content list_products_div col-sm-12 col-md-7 col-lg-6 col-xl-6">*}
                <div id="right-panel" class="pos-content list_products_div col-sm-12 col-md-7 ">
                    <div class="row content_carrito_table">
{*                        <h2 style="margin-top: 0!important;">Lista de Venta</h2>*}
                        <table class="table table-clean mt-2 mb-3 tabla_lista_venta">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center" width="10%">Cantidad</th>
                                    <th scope="col" class="head-title"  width="40%">Producto</th>
{*                                    <th scope="col" class="text-center" width="10%">Desc.</th>*}
{*                                    <th scope="col" class="text-center" width="10%">Aumen.</th>*}
                                    <th scope="col" class="text-center" width="20%">P.U.</th>
                                    <th scope="col" class="text-center" width="25%">Total</th>
                                    <th scope="col" class="text-center" width="5%">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody  v-if="cart.length">
                            <tr class="cart-item" v-for="(item, id) in cart" :key="'id-' + id">
                                <td style="width: 10%">
                                    <div class="quantity">
{*                                        <input type="text" class="number_cantidad form-control" :id="'number_cantidad_'+id" ref="number_cantidad" v-model.number="item.quantity" @keyup="changeCantidad(item)" @input="filterInput" v-focus  @keyup.enter="setFocus()" />*}
                                        <input type="text" class="number_cantidad form-control" :id="'number_cantidad_'+id" ref="number_cantidad" v-model="item.quantity" @keyup="changeCantidad(item)" @input="filterInput" v-focus  @keyup.enter="setFocus()" onkeypress="return !(event.charCode != 46 && event.charCode > 31 && (event.charCode < 48 || event.charCode > 57));"/>
                                    </div>
                                </td>
                                <td style="width: 40%">
                                    <input v-bind:id="'id-' + id" type="text" v-model="item.title">
                                </td>
{*                                <td style="width: 10%" class="text-center">*}
{*                                    <input type="text" class="price form-control" v-model.number="item.descuento" @keyup="changeCantidad(item)"/>*}
{*                                </td>*}
{*                                <td style="width: 10%" class="text-center">*}
{*                                    <input type="text" class="price form-control" v-model.number="item.aumento" @keyup="changeCantidad(item)"/>*}
{*                                </td>*}
                                <td style="width: 20%" class="text-center">
{*                                    <input type="text" class="price form-control" v-model="item.price" @keyup="changeCantidad(item)"/>*}
                                    <my-currency-input :class="'price'" v-model="item.price" @keyup="changePrecioUnitario(item)"></my-currency-input>
                                </td>
                                <td style="width: 25%">
{*                                    <input type="text" class="price form-control" v-model="item.importe_linea" />*}
                                    <my-currency-input :class="'total'" v-model="item.importe_linea" @keyup="changeImporte(item)"></my-currency-input>
                                </td>
                                <td style="width: 5%"><button class="btn btn-danger" @click="borrarProducto(item)"><i class="fa fa-trash fa-lg"></i></button></td>
                            </tr>
                            </tbody>
                            <tfoot  v-if="cart.length">
                                <tr>
                                    <th colspan="4" style="width: 70%">
                                        <h5 class="total-title">Total</h5>
                                    </th>
                                    <th style="width: 30%">
                                        <h5 class="total-title" :inner-html.prop="total | moneda_ache">Total</h5>
                                    </th>
                                </tr>
                            </tfoot>

                            <tbody v-else style="display: inherit!important;">
                                <tr >
                                    <td class="list-empty" colspan="8">
                                        <div class="list-empty-msg">
                                            <i class="icon-warning-sign list-empty-icon"></i>
                                            Ningún producto encontrado
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

{*                        <div data-v-ecb82c18="" data-v-b2bcc9d6="" class="form-group row mb-5" v-if="numero_comprobante">*}
{*                            <label data-v-ecb82c18="" data-v-b2bcc9d6="" for="inputClientEmail" class="col-sm-3 col-form-label">*}
{*                                <strong data-v-ecb82c18="" data-v-b2bcc9d6="">Enviar comprobante a</strong>*}
{*                            </label>*}
{*                            <div class="input-group col-sm-8">*}
{*                                <span class="input-group-addon"><i class="icon-envelope-o"></i></span>*}
{*                                <input data-v-ecb82c18="" data-v-b2bcc9d6="" type="email" id="inputClientEmail" placeholder="ejemplo@email.com" class="form-control">*}
{*                                <span class="input-group-addon btn btn-warning">Enviar</span>*}
{*                            </div>*}
{*                        </div>*}
                        <div class="row" v-if="!exist_product_sinstock">
                            <div v-if="perfil_empleado_vue != 'Vendedor'">
{*                                <div class="col-md-4 mb-2 col-lg-4 col-xl-4 col-sm-12" v-if="is_active_tab_pago">*}
{*                                    <button type="button" class="btn w-100 btn btn-sm btn-outline-primary" :disabled="guardandoEnviar || cart.length  == 0 || bloquear_error" @click="agregarVenta(3)">*}
{*                                        <i class="fa fa-spinner fa-spin fa-lg" v-if="guardandoEnviar"></i>*}
{*                                        Pagar | Sin Imprimir <strong>(CTRL+9)</strong>*}
{*                                    </button>*}
{*                                </div>*}
                                <div class="col-md-4 mb-2 col-lg-4 col-xl-4 col-sm-12" v-if="is_active_tab_pago">
                                    <button type="button" class="btn w-100 btn-primary btn-sm" :disabled="guardandoEnviar || cart.length  == 0  || bloquear_error" @click="agregarVenta(2)" style="text-transform: none;">
                                        <i class="fa fa-spinner fa-spin fa-lg" v-if="guardandoEnviar"></i>
                                        <i class="fa fa-file" v-else></i>
                                        Pagar|Imprimir <strong>(CTRL+Y)</strong>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-4 mb-2 col-lg-4  col-xl-4 col-sm-12" v-if="!is_active_tab_pago">
                                <button type="button" class="btn w-100 btn-light btn-sm" onclick="location.reload()" :disabled="guardandoEnviar">
                                    <i class="fa fa-spinner fa-spin fa-lg" v-if="guardandoEnviar"></i>
                                    <i class="icon-cart-plus" v-else></i> Nueva Venta <strong>(CTRL+1)</strong>
                                </button>
                            </div>
                            {if (bool)$existeCertificado}
                            <div class="col-md-4 mb-2 col-lg-4  col-xl-4 col-sm-12" v-if="order.id && hasComprobante">
                                <button type="button" class="btn w-100 btn-warning btn-sm" :disabled="guardandoEnviar || bloquear_error" @click="enviarComprobanteSunat()">
                                    <i class="fa fa-spinner fa-spin fa-lg" v-if="guardandoEnviar"></i>
                                    <img src="{$img_dir}sunat.png" style="width: 14px; height: auto;" alt="" v-else>&nbsp; Enviar Comprobante
                                </button>
                            </div>
                            {/if}

                            <div class="col-md-4 mb-2 col-lg-4  col-xl-4 col-sm-12" v-if="!is_active_tab_pago">
                                <button type="button" class="btn w-100 btn-warning btn-sm" @click="activeTabPago(true);" :disabled="guardandoEnviar || cart.length  == 0  || bloquear_error" v-if="!order.id">
                                    <i class="fa fa-spinner fa-spin fa-lg" v-if="guardandoEnviar"></i>
                                    <i class="icon-money" v-else></i>
                                    <span v-if="perfil_empleado_vue != 'Vendedor'">Pagar <strong>(CTRL+6)</strong></span>
                                    <span v-else>Cliente <strong>(CTRL+6)</strong></span>
                                </button>
                            </div>

                            <div class="col-md-4 mb-2 col-lg-4  col-xl-4 col-sm-12" v-if="!hasComprobante">
                                <button type="button" class="btn btn-sm btn-success" style="width: 100%;" :disabled="guardandoEnviar || cart.length  == 0" @click="agregarVenta(1)" v-if="!order.id">
                                   <i class="fa fa-spinner fa-spin fa-lg" v-if="guardandoEnviar"></i>
                                   <i class="icon-save" v-else></i>
                                    Venta Sin Pago <strong>(CTRL+V)</strong>
                                </button>
                            </div>

                            <div class="col-md-4 mb-2 col-lg-4 col-xl-4 col-sm-12">
                                <button type="button" class="btn w-100 btn-primary btn-sm" :disabled="guardandoEnviar || cart.length  == 0" @click="cotizarVenta()" style="text-transform: none;">
                                    <i class="fa fa-spinner fa-spin fa-lg" v-if="guardandoEnviar"></i>
                                    <i class="fa fa-save"></i>
                                    Cotizar
                                </button>
                            </div>
                            <div class="col-md-4 mb-2 col-lg-4  col-xl-4 col-sm-12" v-if="!hasComprobante">
                                <button type="button" class="btn btn-sm btn-info" style="width: 100%;" :disabled="guardandoEnviar || cart.length  == 0" @click="transferenciaInterna(1)" v-if="!order.id">
                                    <i class="fa fa-spinner fa-spin fa-lg" v-if="guardandoEnviar"></i>
                                    <i class="icon-save" v-else></i>
                                    Transferencia interna
                                </button>
                            </div>
                        </div>
                        <div class="row" v-else>
                            <div class="col-md-4 mb-2 col-lg-4 col-xl-4 col-sm-12">
                                <button type="button" class="btn w-100 btn-primary btn-sm" :disabled="guardandoEnviar || cart.length  == 0" @click="cotizarVenta()" style="text-transform: none;">
                                    <i class="fa fa-spinner fa-spin fa-lg" v-if="guardandoEnviar"></i>
                                    <i class="fa fa-save" v-else></i>
                                    Cotizar
                                </button>
                            </div>
                            <div class="col-md-4 mb-2 col-lg-4  col-xl-4 col-sm-12" v-if="!is_active_tab_pago">
                                <button type="button" class="btn w-100 btn-warning btn-sm" @click="activeTabPago(true);" :disabled="guardandoEnviar || cart.length  == 0  || bloquear_error" v-if="!order.id">
                                    <i class="fa fa-spinner fa-spin fa-lg" v-if="guardandoEnviar"></i>
                                    <i class="icon-money" v-else></i>
                                    <span>Cliente <strong>(CTRL+6)</strong></span>
                                </button>
                            </div>
                            <div class="col-md-4 mb-2 col-lg-4  col-xl-4 col-sm-12">
                                <button type="button" class="btn w-100 btn-light btn-sm" onclick="window.location.href = url_ajax_vender;" :disabled="guardandoEnviar">
                                    <i class="fa fa-spinner fa-spin fa-lg" v-if="guardandoEnviar"></i>
                                    <i class="icon-cart-plus" v-else></i> Nueva Venta <strong>(CTRL+1)</strong>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="minicart">
                <div class="minicart-content">
                    <div class="heading">
                        <div class="title"></div>
                    </div>
                    <div class="body">
                        <div class="items"><i class="fa fa-arrow-right"></i></div>
                    </div>
                    <div class="footer"></div>
                </div>
            </div>
        </div>
        {if ($perfil_empleado == 'Administrador' || $perfil_empleado == 'SuperAdmin') && $existeCajasAbiertas}
            <div id="elegirCaja-wrapper" {if $cookie_admin_caja}style="display: none;" {/if}>
                <div class="elegirCaja-section section-left text-center container">
                    <div style="display: inline-block;">
                        <h2>Elegir Caja para vender</h2>
                        <br>
                        {assign var='cajas' value=PosArqueoscaja::cajasAbiertas()}

                        {foreach $cajas as $caja}
                            {assign var='empleado' value=Employee::getEmployeeById($caja.id_employee_apertura)}

                                <div class="mb-4 col-md-3 col-lg-12">
                                    <div class="card btn btn-default" style="width: 50vh;" onclick="elegirCajaVender({$caja.id_pos_arqueoscaja});">
                                        <div class="card-body"  >
                                            Caja de {$empleado.firstname}, {$empleado.lastname}
                                        </div>
                                    </div>
                                </div>

                        {/foreach}
                    </div>
                </div>
            </div>
        {/if}
    </div>

{*    <div class="footer_ache">*}
{*       *}
{*    </div>*}

</div>

<div class="alertmessage" id="alertmessage">
    <div style="font-size: 1rem; color: white;">Imprimir</div>
{*    <img title="delete" src="http://icons.iconarchive.com/icons/dryicons/simplistica/16/delete-icon.png"/>*}
</div>

<style>
    .footer_ache {
        position: fixed;
        bottom: 3px;
        right: 3px;
        width: 100%;
        /*background-color: red;*/
        color: white;
        text-align: right;
    }
    #elegirCaja-wrapper .elegirCaja-section {
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
        background: #fff;
        z-index: 99;
    }

    #elegirCaja-wrapper .elegirCaja-section.section-left {
        left: 0;
    }

</style>
{include file="./cierre_caja.tpl"}
<script src="{$tpl_folder}js/vender-vue.js"></script>
<script src="{$tpl_folder}js/vender.js"></script>
{*<script src="https://www.google.com/cloudprint/client/cpgadget.js">*}
</script>