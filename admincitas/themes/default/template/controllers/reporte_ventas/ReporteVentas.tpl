<script type="text/javascript">
    $(document).ready(function(){
        $('.datepicker').datepicker({
            prevText: '',
            nextText: '',
            dateFormat: 'dd/mm/yy',
        });
    });
    function pulsarcalendatio(objeto){
        $('#'+objeto).focus();
    }
</script>

<form enctype="multipart/form-data" action="{$link->getAdminLink('AdminReporteVentas')|escape:'html':'UTF-8'}" id='formTicketajax' method="post">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Filtro del Reporte:</h4>
        </div>
        <div class="panel-body ">
            <div class="container" >
                <div class='row ' >
                    <div class="col-md-3  col-xs-12">
                        <div class="input-group">
                            <div class="col-md-6">
                                <label for="inputName" class="control-label">Fecha Inicio:</label>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group fixed-width-md">
                                    <input name="fecha_inicio" data-hex="true" value="{Tools::getFormatFechaPresentar($fecha_inicio)}" class="datepicker" type="text" id = "fecha_inicio" />
                                    <div class="input-group-addon" onclick="pulsarcalendatio('fecha_inicio');">
                                        <i class="icon-calendar-empty" ></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="input-group">
                            <div class="col-md-6">
                                <label for="inputName" class="control-label">Fecha Termino:</label>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group fixed-width-md">
                                    <input name="fecha_termino" data-hex="true" value="{Tools::getFormatFechaPresentar($fecha_termino)}" class="datepicker" type="text" id = "fecha_termino" />
                                    <div class="input-group-addon" onclick="pulsarcalendatio('fecha_termino');">
                                        <i class="icon-calendar-empty" ></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <input type="submit" id="filtrar" class="btn btn-default" name="filtrar" value="Filtrar"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="panel panel-default  col-sx-12">
    <div class="panel-heading">
        {*            <h4 class="col-md-6 col-sx-12">{$caja.direccion_caja}</h4>*}
    </div>
    <div class="row">
        {*{d($operaciones_ventas[$caja.id_apertura_caja])}*}
        {assign var='nro' value=0}
        <div class="contenido">
            {foreach from=$aperturas_cajas item='aperturas_caja'}

                <div class="row">
                    {*{d($operaciones_venta)}*}
                    {assign var='nro' value=$nro+1}
                    <br>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <span class="badge {if !(bool)$aperturas_caja.estado}badge-danger{/if}">{$aperturas_caja.fecha_apertura|date_format:"%d/%m/%Y %H:%M %p"} - {$aperturas_caja.fecha_cierre|date_format:"%d/%m/%Y %H:%M %p"} - Monto de Apertura Caja: {displayPrice currency=1 price=$aperturas_caja.monto_apertura|round:2} - {$aperturas_caja.empleado_apertura->firstname}, {$aperturas_caja.empleado_apertura->lastname}</span>
                            </div>
                            <div class="pull-right">
                                <a id="desc-oper-export-{$aperturas_caja.id_pos_arqueoscaja}" class="list-toolbar-btn" href="#" style="height: 30px; width: 30px; color: #CCC; float: left; border-left: solid 1px #eee;">
                                        <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Exportar" data-html="true" data-placement="top">
                                            <i class="process-icon-export"></i>
                                        </span>
                                </a>
                                {if $aperturas_caja.id_pos_arqueoscaja}
                                    <a id="desc-oper-imprimir-{$aperturas_caja.id_pos_arqueoscaja}" class="list-toolbar-btn" target="_blank" href="{$link->getAdminLink("AdminPdf")|escape:"html":"UTF-8"}&submitAction=generateInvoicePdf&ventascierrecaja={$aperturas_caja.id_pos_arqueoscaja}" style="height: 30px; width: 30px; color: #CCC; float: left; border-left: solid 1px #eee;">
                                <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Imprimir" data-html="true" data-placement="top">
                                    <i class="process-icon-download"></i>
                                </span>
                                    </a>
                                {/if}
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        jQuery(function ($) {
                            $("#desc-oper-export-{$aperturas_caja.id_pos_arqueoscaja}").click(function () {
                                // parse the HTML table element having an id=exportTable
                                var dataSource = shield.DataSource.create({
                                    data: "#tabla_datos_apertura_{$aperturas_caja.id_pos_arqueoscaja}",
                                    schema: {
                                        type: "table",
                                        fields: {
                                            Fecha: { type: String },
                                            Producto: { type: String },
                                            Cant: { type: String },
                                            // Precio: { type: String },
                                            // SubTotal: { type: String }
                                        }
                                    }
                                });

                                // when parsing is done, export the data to Excel
                                dataSource.read().then(function (data) {
                                    new shield.exp.OOXMLWorkbook({
                                        author: "SCTecnologia",
                                        worksheets: [
                                            {
                                                name: "Reporte Ventas",
                                                rows: [
                                                    {
                                                        cells: [
                                                            {
                                                                style: {
                                                                    bold: true
                                                                },
                                                                type: String,
                                                                value: "Fecha"
                                                            },
                                                            {
                                                                style: {
                                                                    bold: true
                                                                },
                                                                type: String,
                                                                value: "Producto"
                                                            },
                                                            {
                                                                style: {
                                                                    bold: true
                                                                },
                                                                type: String,
                                                                value: "Cant"
                                                            },
                                                            // {
                                                            //     style: {
                                                            //         bold: true
                                                            //     },
                                                            //     type: String,
                                                            //     value: "Precio"
                                                            // },
                                                            // {
                                                            //     style: {
                                                            //         bold: true
                                                            //     },
                                                            //     type: String,
                                                            //     value: "SubTotal"
                                                            // }
                                                        ]
                                                    }
                                                ].concat($.map(data, function(item) {
                                                    return {
                                                        cells: [
                                                            { type: String, value: item.Fecha },
                                                            { type: String, value: item.Producto },
                                                            { type: String, value: item.Cant },
                                                            // { type: String, value: item.Precio },
                                                            // { type: String, value: item.SubTotal }
                                                        ]
                                                    };
                                                }))
                                            }
                                        ]
                                    }).saveAs({
                                        fileName: "Reporte-Ventas"
                                    });
                                });
                            });
                        });
                    </script>
                    <table width="100%" class="table" id="tabla_datos_apertura_{$aperturas_caja.id_pos_arqueoscaja}">
                        <thead>
                            <tr>
                                <th style="text-align: left;" width="20%">Fecha</th>
                                <th style="text-align: left; " width="28%">Producto</th>
                                <th style="text-align: center; " width="9%">Cant</th>
                                <th style="text-align: center;  " width="18%">Importe</th>
                                <th style="text-align: center; " width="20%">Pagos</th>
    {*                            <th style="text-align: center; font-weight: bold;" width="20%">Precio</th>*}
    {*                            <th style="text-align: center; font-weight: bold;" width="20%">SubTotal</th>*}
                            </tr>
                        </thead>
                        <tbody>
                        <!-- PRODUCTS -->
                        {if count($aperturas_caja.efectivo)}
                            <tr class="info">
                                <td style="text-align: center;" colspan="5">
                                    <strong>
                                        Efectivo
                                    </strong>
                                </td>
                            </tr>
                        {foreach from=$aperturas_caja.efectivo item=datos_fila}
                            {if isset($datos_fila.id_order) && (int)$datos_fila.id_order > 0}
                                <tr class="success">
                                    <td style="text-align: left;" colspan="5">
                                        <strong>
                                           Venta {$datos_fila.nro_comprobante} - {$datos_fila.cliente}
                                        </strong>
                                    </td>
                                </tr>

                                {assign var='total' value=0}
                                {assign var='nro_operaciones' value=0}
                                {foreach from=Order::getDetailsOrdersDateFromDateTO((int)$datos_fila.id_order) item='detail'}
                                    {assign var='total' value=$total+$detail.total_price_tax_incl}
                                    {assign var='nro_operaciones' value=$nro_operaciones+1}
                                    {if $detail.product_quantity > 0}
                                        <tr >
                                            <td style="text-align: left;">{$detail.fecha|date_format:"%d/%m/%Y %H:%M %p"}</td>
                                            <td style="text-align: left;">{$detail.product_name}</td>
                                            <td style="text-align: center;">{$detail.product_quantity|round:2}</td>
                                            <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$detail.total_price_tax_incl|round:2}</td>
                                            <td style="text-align: center;">- -</td>
{*                                            <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$detail.unit_price_tax_incl|round:2}</td>*}
{*                                            <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$detail.total_price_tax_incl|round:2}</td>*}
                                        </tr>
                                    {/if}

                                {/foreach}

                                <tr class="warning">
                                    <td style="text-align: right;"></td>
                                    <td style="text-align: right;"></td>
                                    <td style="text-align: right;">Totales</td>
                                    <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$total|round:2}</td>
                                    <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$datos_fila.pagos|round:2}</td>
{*                                    <td style="text-align: right;"></td>*}
{*                                    <td style="text-align: right;"></td>*}
                                </tr>
                            {/if}
                            {foreachelse}
                            <tr>
                                <td class="list-empty" colspan="6">
                                    <div class="list-empty-msg">
                                        <i class="icon-warning-sign list-empty-icon"></i>
                                        Ningún registro encontrado
                                    </div>
                                </td>
                            </tr>
                        {/foreach}
                        {/if}
                        {if count($aperturas_caja.visa)}
                            <tr class="info">
                                <td style="text-align: center;" colspan="5">
                                    <strong>
                                        Visa
                                    </strong>
                                </td>
                            </tr>
                        {foreach from=$aperturas_caja.visa item=datos_fila}
                            {if isset($datos_fila.id_order) && (int)$datos_fila.id_order > 0}
                                <tr class="success">
                                    <td style="text-align: left;" colspan="5">
                                        <strong>
                                            Venta {$datos_fila.nro_comprobante} - {$datos_fila.cliente}
                                        </strong>
                                    </td>
                                </tr>

                                {assign var='total' value=0}
                                {assign var='nro_operaciones' value=0}
                                {foreach from=Order::getDetailsOrdersDateFromDateTO((int)$datos_fila.id_order) item='detail'}
                                    {assign var='total' value=$total+$detail.total_price_tax_incl}
                                    {assign var='nro_operaciones' value=$nro_operaciones+1}
                                    {if $detail.product_quantity > 0}
                                        <tr >
                                            <td style="text-align: left;">{$detail.fecha|date_format:"%d/%m/%Y %H:%M %p"}</td>
                                            <td style="text-align: left;">{$detail.product_name}</td>
                                            <td style="text-align: center;">{$detail.product_quantity|round:2}</td>
                                            <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$detail.total_price_tax_incl|round:2}</td>
                                            <td style="text-align: center;">- -</td>
{*                                            <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$detail.unit_price_tax_incl|round:2}</td>*}
{*                                            <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$detail.total_price_tax_incl|round:2}</td>*}
                                        </tr>
                                    {/if}

                                {/foreach}

                                <tr class="warning">
                                    <td style="text-align: right;"></td>
                                    <td style="text-align: right;"></td>
                                    <td style="text-align: right;">Totales</td>
                                    <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$total|round:2}</td>
                                    <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$datos_fila.pagos|round:2}</td>
{*                                    <td style="text-align: right;"></td>*}
{*                                    <td style="text-align: right;"></td>*}
                                </tr>
                            {/if}
                            {foreachelse}
                            <tr>
                                <td class="list-empty" colspan="6">
                                    <div class="list-empty-msg">
                                        <i class="icon-warning-sign list-empty-icon"></i>
                                        Ningún registro encontrado
                                    </div>
                                </td>
                            </tr>
                        {/foreach}
                        {/if}
                        {if count($aperturas_caja.izipay)}
                            <tr class="info">
                                <td style="text-align: center;" colspan="5">
                                    <strong>
                                        Izipay
                                    </strong>
                                </td>
                            </tr>
                        {foreach from=$aperturas_caja.izipay item=datos_fila}
                            {if isset($datos_fila.id_order) && (int)$datos_fila.id_order > 0}
                                <tr class="success">
                                    <td style="text-align: left;" colspan="5">
                                        <strong>
                                            Venta {$datos_fila.nro_comprobante} - {$datos_fila.cliente}
                                        </strong>
                                    </td>
                                </tr>

                                {assign var='total' value=0}
                                {assign var='nro_operaciones' value=0}
                                {foreach from=Order::getDetailsOrdersDateFromDateTO((int)$datos_fila.id_order) item='detail'}
                                    {assign var='total' value=$total+$detail.total_price_tax_incl}
                                    {assign var='nro_operaciones' value=$nro_operaciones+1}
                                    {if $detail.product_quantity > 0}
                                        <tr >
                                            <td style="text-align: left;">{$detail.fecha|date_format:"%d/%m/%Y %H:%M %p"}</td>
                                            <td style="text-align: left;">{$detail.product_name}</td>
                                            <td style="text-align: center;">{$detail.product_quantity|round:2}</td>
                                            <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$detail.total_price_tax_incl|round:2}</td>
                                            <td style="text-align: center;">- -</td>
                                            {*                                            <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$detail.unit_price_tax_incl|round:2}</td>*}
                                            {*                                            <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$detail.total_price_tax_incl|round:2}</td>*}
                                        </tr>
                                    {/if}

                                {/foreach}

                                <tr class="warning">
                                    <td style="text-align: right;"></td>
                                    <td style="text-align: right;"></td>
                                    <td style="text-align: right;">Totales</td>
                                    <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$total|round:2}</td>
                                    <td style="text-align: center;">{displayPrice currency=$datos_fila.id_currency price=$datos_fila.pagos|round:2}</td>
                                    {*                                    <td style="text-align: right;"></td>*}
                                    {*                                    <td style="text-align: right;"></td>*}
                                </tr>
                            {/if}
                            {foreachelse}
                            <tr>
                                <td class="list-empty" colspan="6">
                                    <div class="list-empty-msg">
                                        <i class="icon-warning-sign list-empty-icon"></i>
                                        Ningún registro encontrado
                                    </div>
                                </td>
                            </tr>
                        {/foreach}
                        {/if}
                        </tbody>
                    </table>
                </div>

            {/foreach}
        </div>
    </div>
</div>
