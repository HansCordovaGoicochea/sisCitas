<style>
	#abrirCaja .contadorCaja {
		background: #fff;
		/*border-radius: 20px;*/
		text-align: center;
		font-size: 1.6em !important;
		height: 47px;
		border-top-right-radius: 55px;
		border-bottom-right-radius: 55px;
		padding: 10px 5px;
	}
	.vertical-alignment-helper {
		display:table;
		height: 100%;
		width: 100%;
		pointer-events:none;
	}
	.vertical-align-center {
		/* To center vertically */
		display: table-cell;
		vertical-align: middle;
		pointer-events:none;
	}
	.modal-content {
		/* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
		width:inherit;
		max-width:inherit; /* For Bootstrap 4 - to avoid the modal window stretching full width */
		height:inherit;
		/* To center horizontally */
		margin: 0 auto;
		pointer-events:all;
	}
</style>
<div class="modal fade" id="nuevo_arqueo{$table}">
	<div class="vertical-alignment-helper">
		<div class="modal-dialog vertical-align-center">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="text-center">Nuevo arqueo de caja</h2>
			</div>
			<div class="modal-body">
				<div id="abrirCaja" role="main" class="ui-content">
					<div class="row form-group hide">
						<div class="text-center">
							<label class="text-center">Seleccione la caja que va a abrir</label>
						</div>
						<select name="id_pos_caja" id="id_pos_caja" class="form-control">
							{foreach PosCaja::getCajas() as $caja}
								<option value="{$caja.id_pos_caja}">{$caja.nombre_caja}</option>
							{/foreach}
						</select>
					</div>
					<div class="text-center">
						<label class="text-center">Escriba el dinero en caja</label>
					</div>
					<div class="contDineroEnCaja row">
						<div class="form-group col-lg-offset-4 col-lg-4 col-xs-12">
							<div class="input-group input-group-lg">
								<span class="input-group-addon" id="helpId" style="border-top-left-radius: 55px; border-bottom-left-radius: 55px; font-size: 1.6em !important;">S/</span>
								<input type="number"
									   class="form-control text-center col-lg-2 contadorCaja" name="monto_apertura" id="monto_apertura" aria-describedby="helpId"
									   value="0.00" step="0.10">
							</div>
						</div>
					</div>
					<p>
						<textarea name="nota_apertura" id="nota_apertura" cols="20" rows="2" aria-describedby="descId"></textarea>
						<small id="descId" class="form-text text-muted">Alguna observación al abrir la caja</small>
					</p>

				</div>
{*				<div id="modules_list_loader"><i class="icon-refresh icon-spin"></i></div>*}
			</div>
			<div class="modal-footer">
{*				<a class="btn btn-primary btn-lg" role="button" id="btnabrirCaja">*}
{*					<span class="ladda-label">*}
{*						<i class="fa fa-inbox fa-lg"></i>*}
{*						{l s='Abrir Caja' d='Admin.Login.Feature'}*}
{*					</span>*}
{*				</a>*}
				<button id="btnabrirCaja" name="btnabrirCaja" type="submit" tabindex="4" class="btn btn-primary btn-lg btn-block ladda-button" data-style="slide-up" data-spinner-color="white" >
					<span class="ladda-label">
						{l s='Abrir Caja' d='Admin.Login.Feature'}
					</span>
				</button>
{*				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>*}
			</div>
		</div>
	</div>
	</div>
</div>
<script type="text/javascript">
	var existe_cajas = '{$exist_cajas}';
	//todo: ladda init
	var l = new Object();
	function clickAbricaja() {
		l = Ladda.create( document.querySelector( '#btnabrirCaja' ) );
	}
	$(document).ready(function(){

	});
	function abrirModalArqueo($id_modal) {
		// $('#importProgress').on('hidden.bs.modal', function () {
		// 	window.location.href = window.location.href.split('#')[0]; // reload same URL but do not POST again (so in GET without param)
		// })
		if (parseInt(existe_cajas) > 0){
			$($id_modal).modal({ backdrop: 'static', keyboard: false, closable: false});
			$($id_modal).modal('show');
		}else{
			$.growl.error({
				title: "Alerta!",
				message: "No hay ninguna caja disponible. Cierre o cree una caja",
				fixed: true,
				size: "large",
				duration: 8000
			});
		}
	}

	$('#btnabrirCaja').click(function () {
		if (parseInt(existe_cajas) > 0){
			$.ajax({
				type:"POST",
				url: "{$link->getAdminLink('AdminPosArqueoscaja')|addslashes}",
				async: true,
				dataType: "json",
				data : {
					ajax: "1",
					token: "{getAdminToken tab='AdminPosArqueoscaja'}",
					tab: "AdminPosArqueoscaja",
					action: "abrirCaja",
					id_pos_caja: $('#id_pos_caja').val(),
					monto_apertura: $('#monto_apertura').val(),
					nota_apertura: $('#nota_apertura').val(),
				},
				beforeSend: function(){
					// $('body').waitMe({
					// 	effect: 'timer',
					// 	text: 'Cargando...',
					// 	color: '#000',
					// 	maxSize: '',
					// 	textPos: 'vertical',
					// 	fontSize: '',
					// 	source: ''
					// });
					clickAbricaja();
					l.start();
				},
				success : function(res)
				{
					if (res.result){
						$.growl.notice({ title: "Exito!",message: "Arqueo creado correctamente!!!" });
						// l.stop();
						location.reload();
						{*window.location.replace("{$link->getAdminLink('AdminVender')|addslashes}");*}
					}else{
						$.growl.error({
							title: "Alerta!",
							message: ""+res.error+"",
							fixed: true,
							size: "large",
							duration: 8000
						});
					}

				},
				complete: function (res) {

				}
			});
		}else{
			$.growl.error({
				title: "Alerta!",
				message: "No hay ninguna caja disponible. Cierre o cree una caja",
				fixed: true,
				size: "large",
				duration: 8000
			});
		}

	})
</script>
