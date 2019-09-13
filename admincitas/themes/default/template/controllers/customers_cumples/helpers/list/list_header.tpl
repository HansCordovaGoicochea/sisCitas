
{extends file="helpers/list/list_header.tpl"}
{block name="override_header"}
	<script>
		$(function () {
			$(".datepicker").datepicker({
				prevText: '',
				nextText: '',
				altFormat: 'yy-mm-dd'
			});
		})

	</script>
	<div class="panel">
			<form action="{$REQUEST_URI}" method="post" class="form-horizontal">
				<div class="row">
					<div class="input-group col-lg-4 col-xs-9">
						<input type="text" class="filter datepicker date-input form-control" id="birthday" name="birthday" value="{Tools::getValue('birthday')}" autocomplete="off">
						<span class="input-group-addon">
							<i class="icon-calendar"></i>
						</span>
						<div class="col-lg-6  col-xs-3">
							<button type="submit" class="btn btn-default" name="submitFilterCumples">
								<i class="icon-search"></i>
								{l s='Filtrar' d='Admin.Orderscustomers.Feature'}
							</button>
						</div>
					</div>

				</div>


			</form>
		</div>
{/block}