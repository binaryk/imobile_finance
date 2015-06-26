<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-6">
	
		<div class="list-group">
			<a href="#" class="list-group-item list-group-item-info">
				Garaj <span class="badge badge-info"> {{$record->numetipgaraj ? $record->numetipgaraj : '-'}} </span>
			</a>
			<a href="#" class="list-group-item list-group-item-info">
				Tip cladire <span class="badge badge-info"> {{$record->numetipcladire ? $record->numetipcladire : '-'}} </span>
			</a>
			<a href="#" class="list-group-item list-group-item-info">
				Finisaj interior <span class="badge badge-info"> {{$record->numetipfinisare ? $record->numetipfinisare : '-'}} </span>
			</a>
			<a href="#" class="list-group-item list-group-item-info">
				Compartimentare <span class="badge badge-info"> {{$record->numetipcompartimentare ? $record->numetipcompartimentare : '-'}} </span>
			</a>
			<a href="#" class="list-group-item list-group-item-info">
				Este agenţie <span class="badge badge-{{$record->is_agentie ? 'success' : 'warning'}}"> {{$record->is_agentie ? 'DA' : 'NU'}} </span>
			</a>
			<a href="#" class="list-group-item list-group-item-info">
				Oferta valabilă <span class="badge badge-{{$record->oferta_valabila ? 'success' : 'warning'}}"> {{$record->oferta_valabila ? 'DA' : 'NU'}} </span>
			</a>
			<a href="#" class="list-group-item list-group-item-info">
				Termopan <span class="badge badge-{{$record->termopan ? 'success' : 'warning'}}"> {{$record->termopan ? 'DA' : 'NU'}} </span>
			</a>
			<a href="#" class="list-group-item list-group-item-info">
				Contoare gaz <span class="badge badge-{{$record->contoare_gaz ? 'success' : 'warning'}}"> {{$record->contoare_gaz ? 'DA' : 'NU'}} </span>
			</a>
			<a href="#" class="list-group-item list-group-item-info">
				Parchet <span class="badge badge-{{$record->parchet ? 'success' : 'warning'}}"> {{$record->parchet ? 'DA' : 'NU'}} </span>
			</a>
			<a href="#" class="list-group-item list-group-item-info">
				Faianţă <span class="badge badge-{{$record->faianta ? 'success' : 'warning'}}"> {{$record->faianta ? 'DA' : 'NU'}} </span>
			</a>

			<a href="#" class="list-group-item list-group-item-info">
				Aer condiţionat <span class="badge badge-{{$record->aer_conditionat ? 'success' : 'warning'}}"> {{$record->aer_conditionat ? 'DA' : 'NU'}} </span>
			</a>
			<a href="#" class="list-group-item list-group-item-info">
				Uscător <span class="badge badge-{{$record->uscator ? 'success' : 'warning'}}"> {{$record->uscator ? 'DA' : 'NU'}} </span>
			</a>
			<a href="#" class="list-group-item list-group-item-info">
				Centrală termică <span class="badge badge-{{$record->centrala_termica ? 'success' : 'warning'}}"> {{$record->centrala_termica ? 'DA' : 'NU'}} </span>
			</a>

			<a href="#" class="list-group-item list-group-item-info">
				Contoare apă <span class="badge badge-{{$record->contoare_apa ? 'success' : 'warning'}}"> {{$record->contoare_apa ? 'DA' : 'NU'}} </span>
			</a>
			<a href="#" class="list-group-item list-group-item-info">
				Zugrăvit lavabil <span class="badge badge-{{$record->zugravit_lavabil ? 'success' : 'warning'}}"> {{$record->zugravit_lavabil ? 'DA' : 'NU'}} </span>
			</a>
			<a href="#" class="list-group-item list-group-item-info">
				Televiziune prin cablu <span class="badge badge-{{$record->tv_cablu ? 'success' : 'warning'}}"> {{$record->tv_cablu ? 'DA' : 'NU'}} </span>
			</a>

			<a href="#" class="list-group-item list-group-item-info">
				Loc pod <span class="badge badge-{{$record->loc_pod ? 'success' : 'warning'}}"> {{$record->loc_pod ? 'DA' : 'NU'}} </span>
			</a>

		</div>

	</div>

	<div class="col-xs-12 col-md-6 col-lg-6">
	
	<div class="list-group">
	
	<a href="#" class="list-group-item list-group-item-info">
		Uşă antiefracţie <span class="badge badge-{{$record->usa_atiefractie ? 'success' : 'warning'}}"> {{$record->usa_atiefractie ? 'DA' : 'NU'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Modificări interioare <span class="badge badge-{{$record->modificari_interioare ? 'success' : 'warning'}}"> {{$record->modificari_interioare ? 'DA' : 'NU'}} </span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Gresie <span class="badge badge-{{$record->gresie ? 'success' : 'warning'}}"> {{$record->gresie ? 'DA' : 'NU'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Balcoane închise <span class="badge badge-{{$record->balcoane_inchise ? 'success' : 'warning'}}"> {{$record->balcoane_inchise ? 'DA' : 'NU'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Are telefon <span class="badge badge-{{$record->has_telefon ? 'success' : 'warning'}}"> {{$record->has_telefon ? 'DA' : 'NU'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Loc pivniţă <span class="badge badge-{{$record->loc_pivnita ? 'success' : 'warning'}}"> {{$record->loc_pivnita ? 'DA' : 'NU'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Parcare <span class="badge badge-{{$record->parcare ? 'success' : 'warning'}}"> {{$record->parcare ? 'DA' : 'NU'}} </span>
	</a>
		<a href="#" class="list-group-item list-group-item-info">
		Preţ <span class="badge badge-info"> {{$record->pret_m2 ? _toFloat($record->pret_m2) . ' EURO' : '-'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Preţ negociabil<span class="badge badge-{{$record->negociabil ? 'success' : 'warning'}}"> {{$record->negociabil ? 'DA' : 'NU'}} </span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Etaj <span class="badge badge-info"> {{$record->numetipetaj ? $record->numetipetaj : '-'}} </span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Balcoane <span class="badge badge-info"> {{$record->numetipbalcon ? $record->numetipbalcon : '-'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Acoperiş <span class="badge badge-info"> {{$record->numetipacoperis ? $record->numetipacoperis : '-'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Confort <span class="badge badge-info"> {{$record->numetipconfort ? $record->numetipconfort : '-'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Ultima actualizare <span class="badge badge-info"> {{$record->ultima_actualizare ? $record->ultima_actualizare : '-'}} </span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Se acceptă "credit prima casă"<span class="badge badge-{{$record->credit_prima_casa ? 'success' : 'warning'}}"> {{$record->credit_prima_casa ? 'DA' : 'NU'}} </span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Număr de băi <span class="badge badge-info"> {{ $record->nr_bai ? $record->nr_bai : '-' }} </span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Sistem de încălzire <span class="badge badge-info"> {{ $record->id_sistem_incalzire ? $record->id_sistem_incalzire : '-' }} </span>
	</a>
	</div>



	</div>
</div>

<div class="well">
	<h4>Detalii balcoane</h4>{{ $record->detalii_bacoane }}
</div>