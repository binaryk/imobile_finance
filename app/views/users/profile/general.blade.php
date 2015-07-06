<div class="portlet box blue" id="portlet-date-generale">
	<div class="portlet-title"><div class="caption">Actualizare date generale</div></div>
	<div class="portlet-body">
		<div class="row" id="container">
			<div class="col-xs-12">{{ $controls['nume']->value($user->nume ? $user->nume : '')->out() }}</div>
			<div class="col-xs-12">{{ $controls['prenume']->value($user->prenume ? $user->prenume : '')->out() }}</div>
			<div class="col-xs-12">{{ $controls['email']->value($user->email ? $user->email : '')->out() }}</div>
			<div class="col-xs-12">{{ $controls['telefon']->value($user->telefon ? $user->telefon : '')->out() }}</div>
		</div>
		<div class="row">
			<div class="col-xs-12"><a id="btn-save-general-data" class="btn blue" href="#">Salvează</a></div>
		</div>
	</div>
</div>