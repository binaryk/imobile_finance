@extends('~layouts.datatable.index')

@section('datatable-specific-page-jquery-initializations')
	

	
	var cautare = new CautareApartamente({
		'dt' : eval('{{$dt->name()}}')
	});

@stop