<div id="form-cautare-apartamente" class="portlet blue box">
	<div class="portlet-title">
		<div class="caption"><i class="fa fa-search"></i> Criterii de cautare</div>
	</div>
	<div class="portlet-body">
		<div class="row">
			<div class="col-xs-12 col-md-3">{{ $controls['dezvoltator']->out()}}</div>
			<div class="col-xs-12 col-md-3">{{ $controls['ansamblu']->out()}}</div>
			<div class="col-xs-12 col-md-3">{{ $controls['imobil']->out()}}</div>
			<div class="col-xs-12 col-md-3">{{ $controls['cladire']->out()}}</div>
			<div class="col-xs-12 col-md-3">{{ $controls['adresa_exacta']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['id_cartier']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['id_localitate']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['nr_camere_min']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['nr_camere_max']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['suprafata_utila_min']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['suprafata_utila_max']->out()}}</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-4">{{ $controls['data_finalizare_cladire']->out()}}</div>
			<div class="col-xs-12 col-md-4">{{ $controls['data_finalizare_ansamblu']->out()}}</div>
			<div class="col-xs-12 col-md-4">{{ $controls['tip_imobil']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['pret_m2_min']->out()}}</div>
			<div class="col-xs-12 col-md-2">{{ $controls['pret_m2_max']->out()}}</div>
		</div>
		<div class="row">
			<div class="col-xs-8 col-md-3">{{ $controls['cbo_telefon']->out()}}</div>
			<div class="col-xs-4 col-md-1"><button id="go-to-adauga-proprietar" type="button" title="Adaugă proprietar persoana fizică" class="btn green btn-xs">Adaugă PF</button></div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-4">{{ $controls['id_tip_finisaje_interioare']->out()}}</div>
			<div class="col-xs-12 col-md-4">{{ $controls['id_tip_stadiu_cladire']->out()}}</div>
			<div class="col-xs-12 col-md-4">{{ $controls['id_tip_stadiu_ansamblu']->out()}}</div>
			<div class="col-xs-12 col-md-4">{{ $controls['id_tip_compartiment']->out()}}</div>
		</div>
	</div>
	<div class="portlet-footer text-left">
		<button id="cmd-search" class="btn bg-blue">Cauta</button>
		<button id="cmd-reset" class="btn">Reseteaza</button>
	</div>
</div>
<input type="hidden" id="id_organizatie" value="{{$current_org->id}}" />