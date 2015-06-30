<div class="portlet box blue" id="portlet-password">
	<div class="portlet-title"><div class="caption">Schimbare parolă</div></div>
	<div class="portlet-body">
		<div class="row" id="container">
			<div class="col-xs-12">{{ str_replace('type="text"', 'type="password"', $controls['old_password']->out()) }}</div>
			<div class="col-xs-12">{{ str_replace('type="text"', 'type="password"', $controls['new_password']->out()) }}</div>
			<div class="col-xs-12">{{ str_replace('type="text"', 'type="password"', $controls['new_password_confirm']->out()) }}</div>
		</div>
		<div class="row">
			<div class="col-xs-12"><a id="btn-save-password" class="btn blue" href="#">Salvează</a></div>
		</div>
	</div>
</div>