@extends('~layouts.datatable.actions')

@section('actions-items')
	<li class="pull-left pull-left">
		<a class="text-maroon" title="Vezi localitatile judetului {{$record->nume}}" href="{{URL::route('judet_localitate_index', ['id' => 'localitati', 'judet_id' => $record->id])}}">
			<i class="fa fa-arrow-right"></i>
			<span>Vezi localități</span>
		</a>
	</li>

	<li class="divider pull-left pull-left"></li>
	<li class="action-update-record pull-left pull-left" data-id="{{$record->id}}"><a href="#"><i class="fa fa-edit"></i> <span>Editare</span></a></li>
	<li class="action-delete-record pull-left pull-left" data-id="{{$record->id}}"><a href="#"><i class="fa fa-eraser text-red"></i> <span class="text-red">Ştergere</span></a></li>
@stop