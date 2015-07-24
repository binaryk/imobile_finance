@extends('~layouts.datatable.actions')

@section('actions-items')
	<li data-id="{{$record->id}}"><a href="{{ URL::route('ansamblu_imobil', ['id' => 'ansamblu_imobile', 'id_ansamblu' => $record->id]) }}"><i class="fa fa-edit"></i> <span>Imobilele ansamblului {{ $record->nume  }}</span></a></li>
	<li><a href="{{URL::route('ansamblu_photo', ['id' => 'ansamblu_photo', 'id_ansamblu' => $record->id])}}"><i class="fa fa-photo"></i> <span>Vezi poze</span></a></li>
	<li class="divider"></li>
	<li class="action-update-record" data-id="{{$record->id}}"><a href="#"><i class="fa fa-edit"></i> <span>Editare</span></a></li>
	<li class="action-delete-record" data-id="{{$record->id}}"><a href="#"><i class="fa fa-eraser text-red"></i> <span class="text-red">Ştergere</span></a></li>
@stop