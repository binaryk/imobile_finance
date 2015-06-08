@extends('~layouts.datatable.actions')

@section('actions-items')
	<li data-id="{{$record->id}}"><a href="{{ URL::route('dezvoltatori_ansambluri', ['id' => 'dezvoltator-ansambluri', 'id_dezvoltator' => $record->id]) }}"><i class="fa fa-edit"></i> <span>Ansamblurile dezvoltatorului {{ $record->nume  }}</span></a></li>
    <li class="divider"></li>
	<li class="action-update-record" data-id="{{$record->id}}"><a href="#"><i class="fa fa-edit"></i> <span>Editare</span></a></li>
	<li class="action-delete-record" data-id="{{$record->id}}"><a href="#"><i class="fa fa-eraser text-red"></i> <span class="text-red">Ştergere</span></a></li>
@stop