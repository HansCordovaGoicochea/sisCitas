{extends file="helpers/list/list_footer.tpl"}
{block name="after"}
    <style>
        .highlight td{
            background-color: #00d0ff!important;
        }

        @media (max-width: 992px) {
            #orderProducts td:nth-of-type(1):before {
                content: "Producto";
            }
            #orderProducts td:nth-of-type(2):before {
                content: "Precio Uni.";
            }
            #orderProducts td:nth-of-type(3):before {
                content: "Cant";
            }
            #orderProducts td:last-child:before {
                content: "Total"!important;
            }
            #orderProducts td:last-child {
                text-align: left!important;
                position: relative;
                padding-left: 35%!important;
                width: 100%!important;
                line-height: 2em!important;
                font-size: 1.15em!important;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            #orderPayments td:nth-of-type(1):before {
                content: "Fecha";
            }
            #orderPayments td:nth-of-type(2):before {
                content: "Metodo.";
            }
            #orderPayments td:last-child:before {
                content: "Monto"!important;
            }
            #orderPayments td:last-child {
                text-align: left!important;
                position: relative;
                padding-left: 35%!important;
                width: 100%!important;
                line-height: 2em!important;
                font-size: 1.15em!important;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }

    </style>
    {include file='controllers/orders/_cajas_pago.tpl'}

    <script>
        $(document).ready(function () {

        });

        $(".cajas_pago").fancybox({
            closeClick  : false, // prevents closing when clicking INSIDE fancybox
            helpers     : {
                overlay : { closeClick: false } // prevents closing when clicking OUTSIDE fancybox
            },
            keys : {
                close: null // prevents close when clicking escape button
            },
            // 'modal' : true,
            'overlayOpacity': 0.4,
            'padding': 0,
            'beforeShow': function(){
                // this.width = $('.fancybox-iframe').contents().find('html').width();
                // this.height = $('.fancybox-iframe').contents().find('html').height();
            },
            'afterShow': function(){
                let id_order = this.element.context.attributes[3].nodeValue;
                $(".fancybox-skin").contents().find("#cajas_pago #id_order").val(id_order);

            },
            'afterClose': function() {

            }
        });

        $('.bonorder_form').on('submit', function () {

            $('body').waitMe({
                effect: 'bounce',
                text: 'Guardando...',
                //    bg : rgba(255,255,255,0.7),
                color: '#000',
                maxSize: '',
                textPos: 'vertical',
                fontSize: '',
                source: ''
            });

            let id_caja = $(this).find('#id_caja');

            if (!id_caja.val()) {
                id_caja.css('outline', '1px solid red');
                setTimeout(function () {
                    id_caja.css('outline', '');
                }, 500);
                $(this).find('.bon_order_errors_phone').show();
                $('.bon_order_errors').hide();
                $('body').waitMe('hide');
                return false;
            }

            $.ajax({
                type: 'POST',
                url: "{$link->getAdminLink('AdminOrders')|addslashes}",
                async: true,
                cache: false,
                dataType : "json",
                data: $(this).serialize(),
                success: function(jsonData) {

                    if (jsonData.msg){
                        $.growl.notice({ title:"", message:jsonData.msg });

                    }
                    // $('body').waitMe('hide');
                    location.reload();
                    // app_factura_compras.cambiarMoneda();
                }
            });


            return false;
        });

        $('.anular_venta').click(function () {
            let estado = parseInt($(this).data('estado'));
            let id_order = parseInt($(this).data('id_order'));
            let tipocomprobante = $(this).data('tipocomprobante');
            $('#id_order_modal_ache').val(id_order);
            $('#tipo_comprobante_modal_ache').val(tipocomprobante);
            $('#modal_anular').modal('show');
            if (estado === 1){
                $('#cajas').hide();
            }
            if (estado === 2){
                $('#cajas').show();
            }

        });


        function getElimP(id, motivo_anulacion, id_caja, code_nota_credito, tipo_comprobante_modal_ache){
            if ($.trim(motivo_anulacion) !== ""){
                if (tipo_comprobante_modal_ache === 'Factura'){
                    jAlert('Llene el motivo de la anulación');
                    return false;
                }

                $('body').waitMe({
                    effect: 'bounce',
                    text: 'Guardando...',
                    //    bg : rgba(255,255,255,0.7),
                    color: '#000',
                    maxSize: '',
                    textPos: 'vertical',
                    fontSize: '',
                    source: ''
                });
                $.ajax({
                    type:"POST",
                    url: "{$link->getAdminLink('AdminOrders')}",
                    async: true,
                    dataType: "json",
                    data : {
                        ajax: "1",
                        token: "{Tools::getAdminTokenLite('AdminOrders')}",
                        tab: "AdminOrders",
                        action: "eliminarPedido",
                        id_order: id,
                        motivo_anulacion: motivo_anulacion,
                        id_caja: id_caja,
                        code_nota_credito: code_nota_credito,
                        tipo_comprobante_modal_ache: tipo_comprobante_modal_ache,
                    },
                    success : function(res)
                    {
                        location.reload();
                    },
                });
            }else{
                jAlert('Llenar el motivo de la anulación');
            }

        }

    </script>

    <div class="modal fade" id="modal_anular"  data-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <label for="">{l s='Anular venta'}</label>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_order_modal_ache" name="id_order_modal_ache">
                    <input type="hidden" id="tipo_comprobante_modal_ache" name="tipo_comprobante_modal_ache">
                    <div class="row hide" id="cajas">
                        <label for="id_caja_descuento">{l s='Seleccione caja'}: <sup>*</sup></label>
                        <select name="id_caja_descuento" id="id_caja_descuento" class="form-control">
                            {assign var="cajas" value=PosArqueoscaja::cajasAbiertasJoinEmpleado()}
                            {foreach from=$cajas item=caja}
                                <option data-montoinicial="{$caja.monto_operaciones}" value="{$caja.id_pos_arqueoscaja}">Caja de {$caja.empleado}</option>
                                {if $caja@last}
                                    <option value="0">- No descontar de caja -</option>
                                {/if}
                            {/foreach}
                        </select>
                    </div>
{*                    <div class="row" id="div_baja">¿Está seguro de anular la <strong id="numero_total_baja">factura F001-85 (PEN 0.00)</strong>?</div>*}
                    <div class="row">
                        <label for="motivo_anulacion">Motivo</label>
                        <textarea name="motivo_anulacion" id="motivo_anulacion" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a onclick="getElimP($('#id_order_modal_ache').val(), $('#motivo_anulacion').val(), $('#id_caja_descuento').val())" class="btn btn-danger" title="Anular"><i class="icon-trash"></i> Anular</a>
                </div>
            </div>
        </div>
    </div>



{/block}