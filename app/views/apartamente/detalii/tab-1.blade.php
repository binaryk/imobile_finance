<div class="list-group">
	<a href="#" class="list-group-item list-group-item-info">
		Judeţ<span class="badge badge-info"> {{$record->judet ? $record->judet->nume : '-'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Localitate<span class="badge badge-info"> {{$record->localitate ? $record->localitate->nume : '-'}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Cartier<span class="badge badge-info"> {{$record->cartier ? $record->cartier->nume : '-'}} </span>
	</a>
</div>