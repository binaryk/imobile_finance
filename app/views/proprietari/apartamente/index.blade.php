@extends('~layouts.datatable.index')
@section('datatable-specific-page-jquery-initializations')
FormiCheck.init();
$('#ultima_actualizare').datepicker({language: "ro", format: "dd.mm.yyyy", autoclose: true}).on('changeDate', function(e){
});
@stop