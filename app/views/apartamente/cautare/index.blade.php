@extends('~layouts.datatable.index')


@section('custom-styles')
	@parent
	{{ HTML::style('packages/daterangepicker/css/daterangepicker-bs3.css') }}
	{{ HTML::style('apartamente/cautare.css') }}
@stop

@section('custom-scripts')
	@parent
	{{ HTML::script('packages/daterangepicker/js/daterangepicker.js') }}
	{{ HTML::script('packages/inputmask/js/jquery.inputmask.js')}}
	{{ HTML::script('packages/inputmask/js/jquery.inputmask.numeric.extensions.js')}}
@stop

@section('datatable-specific-page-jquery-initializations')
	$('.page-bar').hide();
	$('#perioada').daterangepicker({
		'format' : 'DD.MM.YYYY',
		startDate: '01.01.1965',
		endDate: "{{ Carbon\Carbon::now()->format('d.m.Y') }}",
		locale: {
            applyLabel       : 'Aplică',
            cancelLabel      : 'Renunţă',
            fromLabel        : 'De la',
            toLabel          : 'Pâna la',
            customRangeLabel : 'Custom',
            daysOfWeek       : ['Lu', 'Ma', 'Mi', 'Joi', 'Vi', 'Sâ','Du'],
            monthNames       : ['Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie'],
            firstDay: 1
        }
	}, function(start, end, label){});
	$('#pret_m2_min, #pret_m2_max').css({'text-align':'right'}).inputmask('decimal', { 
		radixPoint     : ',',
		digits         : 2,
		groupSeparator : '.',
		autoGroup      : true,
		suffix         : ' LEI'
	});
	$('#nr_camere_min, #nr_camere_max, #nr_etaj_min, #nr_etaj_max').css({'text-align':'right'}).inputmask('integer', { 
		groupSeparator : '.',
		autoGroup      : true
	});

	var cautare = new CautareApartamente({
		'dt' : eval('{{$dt->name()}}')
	});
@stop