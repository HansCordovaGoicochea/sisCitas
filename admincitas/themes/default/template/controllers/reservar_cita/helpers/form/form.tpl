<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Panel title</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label>Time</label>
            <div class="input-group" id="timepicker">
                <input class="form-control"/>
                <span class="input-group-append input-group-addon">
                    <span class="input-group-text"><i class="icon-time"></i></span>
                </span>
            </div>

        </div>
    </div>
</div>
<script>
    $("#timepicker").datepicker({
        defaultDate: new Date(),
        format: 'DD/MM/YYYY H:mm:ss',
        sideBySide: true
    });

</script>