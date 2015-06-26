@extends('~layouts.datatable.index')


@section('custom-styles')
	@parent
	{{ HTML::style('packages/daterangepicker/css/daterangepicker-bs3.css') }}
	{{ HTML::style('packages/select2/4.0.0/css/select2.min.css') }}
	{{ HTML::style('apartamente/cautare.css') }}
@stop

@section('custom-scripts')
	@parent
	{{ HTML::script('packages/daterangepicker/js/daterangepicker.js') }}
	{{ HTML::script('packages/inputmask/js/jquery.inputmask.js')}}
	{{ HTML::script('packages/inputmask/js/jquery.inputmask.numeric.extensions.js')}}
	{{ HTML::script('packages/select2/4.0.0/js/select2.min.js')}}
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

  	function formatRepo(repo)
  	{
  		console.log(repo);
    	if(repo.loading)
    	{
    		return repo.text;
    	}
    	var markup = 
			'<div class="clearfix">' +
			'<div class="col-sm-1">' +
			'<img src="' + repo.owner.avatar_url + '" style="max-width: 100%" />' +
			'</div>' +
			'<div clas="col-sm-10">' +
			'<div class="clearfix">' +
			'<div class="col-sm-6">' + repo.full_name + '</div>' +
			'<div class="col-sm-3"><i class="fa fa-code-fork"></i> ' + repo.forks_count + '</div>' +
			'<div class="col-sm-2"><i class="fa fa-star"></i> ' + repo.stargazers_count + '</div>' +
			'</div>';
    	if (repo.description) 
    	{
      		markup += '<div>' + repo.description + '</div>';
    	}
    	markup += '</div></div>';
    	return markup;
    }

  	function formatRepoSelection(repo) 
  	{
    	return repo.full_name || repo.text;
  	}

  	$("#cbo_telefon").select2({
  		placeholder : "Căutaţi un număr de telefon",
  		allowClear  : true,
  		ajax        : 
  			{
    			url           : "{{ URL::route('apartamente-cauta-telefon')}}",
    			type          :'post',
    			dataType      : 'json',
    			delay         : 250,
    			data          : function(params) {return {q: params.term, page: params.page};},
    			processResults: function(data, page) {return {results: data.items};},
    			cache         : true
  			},
 		escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
  		minimumInputLength: 3,
  		templateResult: formatRepo, // omitted for brevity, see the source of this page
  		templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
  	});
@stop