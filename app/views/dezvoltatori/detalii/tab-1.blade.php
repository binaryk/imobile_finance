<div class="list-group">
	<a href="#" class="list-group-item list-group-item-info">
		Nume<span class="badge badge-info"> {{$record->nume ? $record->nume : '-'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Telefon<span class="badge badge-info"> {{$record->nume ? $record->telefon : '-'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Adresa<span class="badge badge-info"> {{$record->adresa ? $record->adresa: '-'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Judet<span class="badge badge-info"> {{$record->numejudet ? $record->numejudet: '-'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Strada<span class="badge badge-info"> {{$record->adresa ? $record->adresa: '-'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Email<span class="badge badge-info"> {{$record->email ? $record->email: '-'}} </span>
	</a>
</div>