@extends('~layouts.datatable.actions')

@section('actions-items')
	<li><a href="{{URL::route('cladire_apartament', ['id' => 'cladire_apartament', 'id_cladire' => $record->id])}}"><i class="fa fa-home"></i> <span>Vezi apartamente</span></a></li>
	<li><a href="{{URL::route('cladire_photo', ['id' => 'cladire_photo', 'id_cladire' => $record->id])}}"><i class="fa fa-photo"></i> <span>Vezi poze</span></a></li>
	<li class="divider"></li>
	<li class="action-update-record" data-id="{{$record->id}}"><a href="#"><i class="fa fa-edit"></i> <span>Editare</span></a></li>
	<li class="action-delete-record" data-id="{{$record->id}}"><a href="#"><i class="fa fa-eraser text-red"></i> <span class="text-red">Ştergere</span></a></li>
@stop