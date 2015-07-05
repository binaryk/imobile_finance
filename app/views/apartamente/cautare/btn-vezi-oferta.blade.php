

@extends('~layouts.datatable.actions')

@section('actions-items')
    <li data-id="{{$record->id}}"><a href="{{ URL::route('apartament-detalii-oferta', ['id' => $record->id])}}">Oferta</a></li>
    <li data-id="{{$record->id}}"><a href="{{ URL::route('editare-apartament-gasit', ['id' => $record->id])}}">Editare</a></li>
@stop