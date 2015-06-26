@extends('~layouts.datatable.index')

<?php
	$telefon = \Input::get('telefon') ? \Input::get('telefon') : '';
?>

@section('datatable-specific-page-jquery-initializations')
	@if($telefon) 
		form.aftershow = function(record, action)
		{
			if( action == 'insert' )
			{
				$('#telefon').val('{{$telefon}}');
			}
		};
		$('.action-insert-record').trigger('click');
	@endif
@stop