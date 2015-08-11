@extends('~layouts.datatable.index')

@section('before-datatable')
	<div class="note note-info" id="note-info-cautare">
		<div style="float:left;width:5%">
			<i class="fa fa-info-circle" style="font-size:32px; line-height:32px; vertical-align:middle;"></i>
		</div>
		<div style="float:left;width:95%">
			<span style="padding-left:4px; display:block">Pentru a cauta dupa numărul de telefon al dezvoltatorului introduceti numarul direct in campul de deasupra tabelului.</span>
			</div>
		<div class="clearfix"></div>
	</div>
@stop

@section('custom-styles')
	@parent
	{{ HTML::style('packages/daterangepicker/css/daterangepicker-bs3.css') }}
	{{ HTML::style('packages/select2/4.0.0/css/select2.min.css') }}
	{{ HTML::style('apartamente/cautare_dezvoltatori.css') }}
@stop

@section('custom-scripts')
	@parent
	{{ HTML::script('packages/daterangepicker/js/daterangepicker.js') }}
	{{ HTML::script('packages/inputmask/js/jquery.inputmask.js')}}
	{{ HTML::script('packages/inputmask/js/jquery.inputmask.numeric.extensions.js')}}
	{{ HTML::script('packages/select2/4.0.0/js/select2.min.js')}}
@stop

@section('datatable-specific-page-jquery-initializations')
	var searched = '';

	$('.page-bar').hide();
	$('#perioada, #perioada_ansamblu').daterangepicker({
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
		suffix         : ' EURO'
	});
	$('#nr_camere_min, #nr_camere_max, #nr_etaj_min, #nr_etaj_max').css({'text-align':'right'}).inputmask('integer', {
		groupSeparator : '.',
		autoGroup      : true
	});

	var cautare = new CautareDezvoltatori({
		'dt' : eval('{{$dt->name()}}'),
		'change_oferta_valabila_endpoint' : "{{ URL::route('change_oferta_valabila_endpoint')}}",
		'change_data_actualizare_endpoint' : "{{ URL::route('change_data_actualizare_endpoint')}}",
	});

  	function formatRepo(repo)
  	{
  		if(repo.loading)
  		{
  			return repo.text;
  		}
  		console.log(repo);
  		var style = repo.phone_type == 'Agenţie' ? ' style="color:#F00"' : ' style="color:#00F"';
    	var markup =
			'<div class="clearfix">' +
				'<div style="font-weight:bold">' + repo.telefon + '</div>' +
				'<div' + style + '>' + repo.nume + ' - ' + repo.phone_type + '</div>' +
			'</div>';

    	return markup;
    }

  	function formatRepoSelection(repo)
  	{
    	return repo.text || (repo.telefon);
  	}

  	var selectTelefon = $("#cbo_telefon").select2({
  		placeholder : "Căutaţi un număr de telefon",
  		allowClear  : true,
  		closeOnSelect : true,
  		ajax        :
  			{
    			url           : "{{ URL::route('apartamente-cauta-telefon')}}",
    			type          :'post',
    			dataType      : 'json',
    			delay         : 250,
    			data          : function(params) {return {q: params.term, page: params.page};},
    			processResults: function(data, page) {
    				searched = data.searched;
    				return {results: data.items};
    			},
    			cache         : true
  			},
 		escapeMarkup: function (markup) { return markup; },
  		minimumInputLength: 3,
  		templateResult: formatRepo,
  		templateSelection: formatRepoSelection
  	});

  	$('#box-cauta-apartamente').on('click', '#go-to-adauga-proprietar', function(){

		if($('#cbo_telefon').val() == 'not-exist')
		{
			var numar = $('#cbo_telefon').select2('data')[0].telefon;
			if( numar.length )
			{
				var route = "{{ URL::route('proprietar-index')}}";
				location.href = route + '?telefon=' + numar;
			}
		}
	});

  	selectTelefon.on("select2:select", function (e) {
  		if($('#cbo_telefon').val() == 'not-exist')
  		{
  			var type = $('#cbo_telefon').select2('data')[0].phone_type;
  			if(type != 'Agenţie')
  			{
  				$('#go-to-adauga-proprietar').show();
  			}
  		}
  	});

  	selectTelefon.on("select2:open", function (e) {
  		$('#go-to-adauga-proprietar').hide();
  	});
@stop