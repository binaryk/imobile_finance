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

</div>

<div class="well">
	<h4>Zona aproximativă</h4>{{ $record->zona_aproximativa }}
</div> 
<div class="well">
	<h4>Număr clădire</h4>{{ $record->nr_cladire }}
</div>
<div class="well">
	<h4>Scară</h4>{{ $record->scara }}
</div>
<div class="well">
	<h4>Număr apartament</h4>{{ $record->nr_apartament }}
</div>
<div class="well">
	<h4>Adresa exactă</h4>{{ $record->strada }}
</div>

<div class="well">
	<h4>Detalii</h4>{{ $record->detalii }}
</div>
<div class="well">
	<h4>Observatii</h4>{{ $record->detalii_suplimentare }}
</div>
<div class="well">
	<h4>Observatii suplimentare</h4>{{ $record->detalii_suplimentare_2 }}
</div>

<div class="well">
	<h4>Detalii private</h4>{{ $record->detalii_private }}
</div>