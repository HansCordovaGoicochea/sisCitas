<style>
    .sunat-button {
        text-transform: uppercase!important;
        font-weight: 600!important;
        background-color: #0264af!important;
        border-color: #0264af!important;
        color: #fff!important;
    }

    .container {
        width: 100%;
        font-family: "Arial";
    }

    .progressbar {
        counter-reset: step;
    }
    .progressbar li {
        list-style: none;
        display: inline-block;
        width: 30.33%;
        position: relative;
        text-align: center;
        cursor: pointer;
    }
    .progressbar li:before {
        /*content: counter(step);
        counter-increment: step;*/
        content: "";
        width: 30px;
        height: 30px;
        line-height : 30px;
        border: 1px solid #E9E9E9;
        border-radius: 100%;
        display: block;
        text-align: center;
        margin: 0 auto 10px auto;
        color: white;
        background-color: #E9E9E9;

    }
    .progressbar li:after {
        content: "";
        position: absolute;
        width: 100%;
        height: 4px;
        background-color: #E9E9E9;
        top: 14px;
        left: -50%;
        z-index : -1;
    }
    .progressbar li:first-child:after {
        content: none;
    }
    .progressbar li.active {
        color: #1181F2;
    }
    .progressbar li.active:before {
        font-family: FontAwesome, serif;
        border-color: #1181F2;
        background-color: #1181F2;
        animation: pulse 2s infinite;
        content: '\f00c';

    }
    .progressbar li.active + li:after {
        background-color: #1181F2;
        background: linear-gradient(to right, #1181F2 50%, #E9E9E9 50%);
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(33,131,221, 0.4);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(33,131,221, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(33,131,221, 0);
        }
    }
</style>
<div class="container">
    <ul class="progressbar">
        <li class="active">Pendiente</li>
        <li>Atendido</li>
        <li>Facturado</li>
    </ul>
</div>


<div class="row" id="form_div_cita">
    <input type="hidden" id="id_reservar_cita" name="id_reservar_cita" value="">
    <div class="panel">
        <div class="panel-heading">
            <i class="icon-table"></i>&nbsp;Cita
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group col-lg-6 ">
                        <label for="id_colaborador" class="control-label required">{l s='Colaborador:' d='Admin.Orderscustomers.Feature'}</label>
                        <select name="id_colaborador" id="id_colaborador" class="chosen required">
                            <option value="">{l s='-- Elija un Colaborador --' d='Admin.Actions'}</option>
                            {foreach $colaboradores as $employee}
                                <option value="{$employee.id_employee}"> {$employee.firstname} {$employee.lastname}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="fecha_inicio" class="control-label required">Fecha y Hora:</label>
                        <div class="input-group" id="timepicker">
                            <input type="text" class="form-control datetimepicker" id="fecha_inicio" name="fecha_inicio" autocomplete="off" value="">
                            <span class="input-group-append input-group-addon">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="product_id" name="product_id" value="0" />
                        <label for="product_id" class="control-label required">Servicio:</label>
                        <div class="input-group">
                            <input type="text" id="product_name" name="product_name" value="" autocomplete="off" placeholder="Buscar servicio"/>
                            <div class="input-group-addon">
                                <i class="icon-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_id" class="control-label">Observación:</label>
                        <textarea name="observacion" id="observacion" rows="2"></textarea>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="tipo_doc">Estado Actual:</label>
                        <select name="estado_actual" id="estado_actual" class="chosen">
                            <option value="0">Pendiente</option>
                            <option value="1">Atendido</option>
                            <option value="2">Cancelado</option>
                            <option value="3">Facturado</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="div_datos_cliente">

{*                    <input type="hidden" class="input_ache" name="id_customer" id="id_customer" value="'+data.result.id_customer+'">*}
                    <div class="form-group col-lg-4">
                        <label for="tipo_doc" class="control-label required">Tipo Doc.:</label>
                        <select name="cb_tipo_documento" id="cb_tipo_documento" class="form-control">
                            {foreach $tipo_documentos as $doc}
                                <option value="{$doc['id_tipodocumentolegal']}" data-codsunat="{$doc['cod_sunat']}">- {$doc['nombre']} -</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="nro_doc" class="control-label required">N° Doc:</label>
                        <div class="row">
                            <div class="col-lg-9 col-xs-9">
                                <input type="text" class="form-control" id="txtNumeroDocumento" name="txtNumeroDocumento" placeholder="Número de documento" maxlength="8" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                            </div>
                            <div class="col-lg-2 col-xs-2">
                                <button type="button" class="btn btn-default sunat-button" onclick="traerDatosSunat()" id="buscar_sunat">
                                    &nbsp;<i class="icon-search" style="color: #fff"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="txtNombre" class="control-label required">Cliente:</label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="txtDireccion" class="control-label">Dirección:</label>
                        <input type="text" class="form-control" id="txtDireccion" name="txtDireccion">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="birthday" class="control-label required">Fecha Nacimiento:</label>
                        <input type="text" class="form-control datepicker" id="birthday" name="birthday">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="celular" class="control-label">Celular:</label>
                        <input type="text" class="form-control" id="celular" name="celular">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit" value="1" id="cita_guardar_btn" class="btn btn-default pull-right">
                <i class="process-icon-save"></i> Guardar
            </button>
            <a class="btn btn-default" onclick="window.history.back();">
                <i class="process-icon-cancel"></i> Cancelar
            </a>
        </div>
    </div>
</div>

<script>
    const url_ajax_cita = "{$link->getAdminLink('AdminReservarCita')|addslashes}";

    
    $('#cita_guardar_btn').click(function () {
        $.ajax({
            type: "POST",
            url: "{$link->getAdminLink('AdminReservarCita')|addslashes}",
            async: true,
            dataType: "json",
            data: {
                ajax: "1",
                token: "{getAdminToken tab='AdminReservarCita'}",
                tab: "AdminReservarCita",
                action: "guardarCita",
                // data: $('#form_div_cita').serialize() + "&moredata=" + morevalue
                data: $('#form_div_cita').find("select, textarea, input").serialize()
            },
            beforeSend: function () {
                $('body').waitMe({
                    effect: 'timer',
                    text: 'Guardando...',
                    color: '#000',
                    maxSize: '',
                    textPos: 'vertical',
                    fontSize: '',
                    source: ''
                });
            },
            success: function (res) {


            },
            complete: function (res) {
                $('body').waitMe('hide');
            }
        })
    });
    
    function limitText(field, maxChar){
        $(field).attr('maxlength',maxChar);
    }

    $("#cb_tipo_documento").change(function (e) {
        var $this = $(this);
        e.preventDefault();
        //$this.button('loading');
        var value = parseInt($(this).find(':selected').data("codsunat"));
        $('#txtNumeroDocumento').val("");
        $('#txtNombre').val("");
        $('#txtDireccion').val("");
        // alert(value);
        if (value === 1) {
            limitText('#txtNumeroDocumento', 8);
        } else if(value === 4) {
            limitText('#txtNumeroDocumento', 12);
        }else if(value === 6) {
            limitText('#txtNumeroDocumento', 11);
        }
    });

    function traerDatosSunat() {
        // alert("buscar")
        $('.input_ache').remove();
        var data_cod_sunat = $("#cb_tipo_documento").find(':selected').data('codsunat');
        $.ajax({
            type: "POST",
            url: "{$link->getAdminLink('AdminCustomers')|addslashes}",
            async: true,
            dataType: "json",
            data: {
                ajax: "1",
                token: "{getAdminToken tab='AdminCustomers'}",
                tab: "AdminCustomers",
                action: "getDataDataBase",
                nruc: $.trim($("#txtNumeroDocumento").val()),
            },
            beforeSend: function () {
                $('body').waitMe({
                    effect: 'timer',
                    text: 'Consultando...',
                    color: '#000',
                    maxSize: '',
                    textPos: 'vertical',
                    fontSize: '',
                    source: ''
                });
            },
        })
            .done(function (data, textStatus, jqXHR) {

                if (data['success'] != "false" && data['success'] != false) {
                    // $("#json_code").text(JSON.stringify(data, null, '\t'));
                    if (typeof (data['result']) != 'undefined') {
                        if(!$(".input_ache").length) {
                            $('#div_datos_cliente').append('<input type="hidden" class="input_ache" name="id_customer" id="id_customer" value="'+data.result.id_customer+'">');
                        }
                        $('#txtNombre').val(data.result.firstname);
                        $('#txtDireccion').val(data.result.direccion);

                    }

                    $('body').waitMe('hide');
                } else {

                    $('#txtNombre').val("");
                    $('#txtDireccion').val("");

                    $.ajax({
                        type: "POST",
                        url: "{$link->getAdminLink('AdminCustomers')|addslashes}",
                        async: true,
                        dataType: "json",
                        data: {
                            ajax: "1",
                            token: "{getAdminToken tab='AdminCustomers'}",
                            tab: "AdminCustomers",
                            action: "getDataSunat",
                            nruc: $.trim(($('#txtNumeroDocumento').val()))
                        },
                        beforeSend: function () {
                            $('body').waitMe({
                                effect: 'timer',
                                text: 'Consultando...',
                                color: '#000',
                                maxSize: '',
                                textPos: 'vertical',
                                fontSize: '',
                                source: ''
                            });
                        },
                    })
                        .done(function (data, textStatus, jqXHR) {
                            if (data['success'] != "false" && data['success'] != false) {
                                // $("#json_code").text(JSON.stringify(data, null, '\t'));
                                if (typeof (data['result']) != 'undefined') {
                                    if(!$(".input_ache").length) {
                                        $('#div_datos_cliente').append('<input type="hidden" class="input_ache" name="id_customer" id="id_customer" value="'+data.cliente.id+'">');
                                    }
                                    $('#txtNombre').val(data.result.RazonSocial);
                                    $('#txtDireccion').val(data.result.Direccion.replace(new RegExp('-', 'g'), ""));
                                }

                                $('body').waitMe('hide');
                            } else {
                                if (typeof (data['msg']) != 'undefined') {
                                    alert(data['msg']);
                                }
                                $('#txtNombre').val("");
                                $('#txtDireccion').val("");

                                $('body').waitMe('hide');
                            }
                        })
                        .fail(function (jqXHR, textStatus, errorThrown) {
                            alert("Solicitud fallida:" + textStatus);
                            $('body').waitMe('hide');
                        });
                    //$this.button('reset');
                }

            }).fail(function (jqXHR, textStatus, errorThrown) {
            alert("Solicitud fallida:" + textStatus);
            $('body').waitMe('hide');
        });
    }


    $("#product_name").autocomplete(url_ajax_cita,
        {
            minChars: 1,
            max: 10,
            // width: 100%,
            selectFirst: true,
            scroll: false,
            dataType: "json",
            highlightItem: true,
            formatItem: function(data, i, max, value, term) {
                return value;
                // return '<table><tr><td valign="top">' + value + '</td><td valign="top"> 123 </td></tr></table>';
            },
            parse: function(data) {
                var products = new Array();
                if (typeof(data.products) != 'undefined')
                    for (var i = 0; i < data.products.length; i++)
                        products[i] = { data: data.products[i], value: data.products[i].name };
                return products;
            },
            extraParams: {
                ajax: true,
                token: token,
                action: 'getProductByName',
                product_search: function() { return $('#product_name').val(); }
            }
        }
    )
        .result(function(event, data, formatted) {
            if (!data)
            {

            }
            else
            {
                // Keep product variable
                current_product = data;
                $('#product_id').val(data.id_product);
                $('#product_name').val(data.name);
            }
        });


    $('.datetimepicker').datetimepicker({
        prevText: '',
        nextText: '',

        // dateFormat: 'yy-mm-dd',
        dateFormat: 'dd/mm/yy',
        // Define a custom regional settings in order to use PrestaShop translation tools
        currentText: '{l s='Now' js=1}',
        closeText: '{l s='Done' js=1}',
        showSecond: false,
        ampm: true,
        amNames: ['AM', 'A'],
        pmNames: ['PM', 'P'],
        // timeFormat: 'HH:mm:ss',
        timeFormat: 'hh:mm tt', //24 horas
        timeSuffix: '',
        timeOnlyTitle: '{l s='Choose Time' js=1}',
        timeText: '{l s='Hora:' js=1}',
        hourText: '{l s='Hour' js=1}',
        minuteText: '{l s='Minute' js=1}',

    });

    $('.datepicker').datepicker({
        prevText: '',
        nextText: '',
        dateFormat: 'yy-mm-dd',
        // dateFormat: 'dd/mm/yy',
        changeYear: true,
        changeMonth: true,
        yearRange: "-100:+0", // last hundred years
    });

    $(".chosen").chosen({
        placeholder_text_multiple: "Seleccione Colaborador...",
        no_results_text: "Vaya, no se ha encontrado nada!",
        width: "100%"
    });

</script>