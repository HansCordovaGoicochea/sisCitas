<style>
    .sunat-button {
        text-transform: uppercase!important;
        font-weight: 600!important;
        background-color: #0264af!important;
        border-color: #0264af!important;
        color: #fff!important;
    }
</style>
<div class="row">
    <div class="panel">
        <div class="panel-heading">
            <i class="icon-table"></i>&nbsp;Cita
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group col-lg-6">
                        <label for="id_colaborador">{l s='Colaborador:' d='Admin.Orderscustomers.Feature'}</label>
                        <select name="id_colaborador" id="id_colaborador" class="chosen">
                            <option value="">{l s='-- Elija un Colaborador --' d='Admin.Actions'}</option>
                            {foreach $colaboradores as $employee}
                                <option value="{$employee.id_employee}"> {$employee.firstname} {$employee.lastname}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="fecha_inicio">Fecha y Hora:</label>
                        <div class="input-group" id="timepicker">
                            <input type="text" class="form-control datetimepicker" id="fecha_inicio" name="fecha_inicio" autocomplete="off" value="">
                            <span class="input-group-append input-group-addon">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="product_id" name="product_id" value="0" />
                        <label for="product_id">Servicio:</label>
                        <div class="input-group">
                            <input type="text" id="product_name" value="" autocomplete="off" placeholder="Buscar servicio"/>
                            <div class="input-group-addon">
                                <i class="icon-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_id">Observación:</label>
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
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group col-lg-4">
                        <label for="tipo_doc">Tipo Doc.:</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="nro_doc">N° Doc:</label>

                        <div class="row">
                            <div class="col-lg-9 col-xs-9">
                                <input type="text" class="form-control" placeholder="Número de documento">
                            </div>
                            <div class="col-lg-2 col-xs-2">
                                <button type="button" class="btn btn-default sunat-button" onclick="traerDatosSunat()" id="buscar_sunat" disabled="disabled">
                                    SUNAT&nbsp;<i class="icon-search" style="color: #fff"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="fecha_nacimiento">Cliente:</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="fecha_nacimiento">Dirección:</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="fecha_nacimiento">Fecha Nacimiento:</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="fecha_nacimiento">Celular:</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit" value="1" id="customer_form_submit_btn" class="btn btn-default pull-right">
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
    $("#product_name").autocomplete(url_ajax_cita,
        {
            minChars: 3,
            max: 10,
            width: 500,
            selectFirst: true,
            scroll: false,
            dataType: "json",
            highlightItem: true,
            formatItem: function(data, i, max, value, term) {
                return value;
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
        timeText: '{l s='Time' js=1}',
        hourText: '{l s='Hour' js=1}',
        minuteText: '{l s='Minute' js=1}',

    });

    $('.datepicker').datepicker({
        prevText: '',
        nextText: '',
        // dateFormat: 'yy-mm-dd',
        dateFormat: 'dd/mm/yy',
    });

    $(".chosen").chosen({
        placeholder_text_multiple: "Seleccione Espacios...",
        no_results_text: "Vaya, no se ha encontrado nada!",
        width: "100%"
    });




</script>