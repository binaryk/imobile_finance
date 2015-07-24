@extends('~layouts.datatable.index')
@section('datatable-specific-page-jquery-initializations')
    if (jQuery().datepicker) {
        $('#data_finalizare').datepicker(
        {
            language: "ro",
            format: "dd.mm.yyyy",
            autoclose: true,
            rtl: Metronic.isRTL(),
            orientation: "left",
            autoclose: true,
            todayBtn: 'linked',
            clearBtn: true
            }).on('changeDate', function(e)
        {});
    }
@stop