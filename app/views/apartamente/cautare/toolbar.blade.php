<div id="form-cautare-apartamente" class="portlet blue box">
	<div class="portlet-title">
		<div class="caption"><i class="fa fa-search"></i> Criterii de cautare</div>
	</div>
	<div class="portlet-body">
		<div class="row">
			<div class="col-xs-12 col-md-3">{{ $controls['oferta-valabila']->out()}}</div>
			<div class="col-xs-12 col-md-3">{{ $controls['adresa-exacta']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['id_cartier']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['nr_camere_min']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['nr_camere_max']->out()}}</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-4">{{ $controls['ultima_actualizare']->out()}}</div>
			<div class="col-xs-12 col-md-4">{{ $controls['tip_imobil']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['pret_m2_min']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['pret_m2_max']->out()}}</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-4">{{ $controls['telefon']->out()}}</div>
			<div class="col-xs-12 col-md-4">{{ $controls['credit_prima_casa']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['nr_etaj_min']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['nr_etaj_max']->out()}}</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-4">{{ $controls['id_tip_finisaje_interioare']->out()}}</div>
			<div class="col-xs-12 col-md-4">{{ $controls['id_tip_compartiment']->out()}}</div>
			<div class="col-xs-12 col-md-4">{{ $controls['vechime_imobil']->out()}}</div>
		</div>
	</div>
	<div class="portlet-footer text-left">
		<button id="cmd-search" class="btn bg-blue">Cauta</button>
		<button id="cmd-reset" class="btn">Reseteaza</button>
	</div>
</div>
<input type="hidden" id="id_organizatie" value="{{$current_org->id}}" />