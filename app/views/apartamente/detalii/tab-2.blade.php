<div class="list-group">
	<a href="#" class="list-group-item list-group-item-info">
		Nume <span class="badge badge-info"> {{$record->nume ? $record->nume : '-'}} </span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Email <span class="badge badge-info"> {{$record->email ? $record->email : '-'}} </span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Telefoane <span class="badge badge-info"> {{ \Easy\Form\StringHelper::Items([$record->telefon, $record->telefon_secundar_1, $record->telefon_secundar_2]) }} </span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Număr de camere <span class="badge badge-info"> {{ $record->nr_camere ? $record->nr_camere : '-' }} </span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Anul construcţiei <span class="badge badge-info"> {{ $record->anul_constructiei ? $record->anul_constructiei : '-' }} </span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Zona aproximativă <span class="badge badge-info"> {{ $record->zona_aproximativa }} </span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Număr clădire <span class="badge badge-info"> {{ $record->nr_cladire }}</span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Scară <span class="badge badge-info"> {{ $record->scara }}</span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Număr apartament <span class="badge badge-info"> {{ $record->nr_apartament }}</span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Adresa exactă <span class="badge badge-info"> {{ $record->strada }}</span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Detalii <span class="badge badge-info"> {{ $record->detalii }}</span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Observatii <span class="badge badge-info"> {{ $record->detalii_suplimentare }}</span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Observatii suplimentare <span class="badge badge-info"> {{ $record->detalii_suplimentare_2 }}</span>
	</a>

	<a href="#" class="list-group-item list-group-item-info">
		Detalii private <span class="badge badge-info"> {{ $record->detalii_private }}</span>
	</a>	

</div>
 