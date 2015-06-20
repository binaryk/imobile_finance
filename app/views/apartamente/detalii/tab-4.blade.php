<div class="list-group">
	<a href="#" class="list-group-item list-group-item-info">
		ID<span class="badge badge-info"> #{{$record->id}} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Data creării<span class="badge badge-info"> {{_toDateTime($record->created_at) }} </span>
	</a>
	<a href="#" class="list-group-item list-group-item-info">
		Data modificării<span class="badge badge-info"> {{_toDateTime($record->updated_at) }} </span>
	</a>
</div>