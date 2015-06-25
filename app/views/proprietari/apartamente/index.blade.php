@extends('~layouts.datatable.index')
@section('datatable-specific-page-jquery-initializations')


$('[name=tip_imobil]').on('change', function(e){
	if( $(this).val() == '1' )//apartament
		$('.apartamente').show();
	if( $(this).val() == '3' )//casa
		$('.apartamente, .apartamente > .casa').show();
})


FormiCheck.init();
$('select.form-select').select2({
    placeholder: "Alege",
    allowClear: true 
}); 
ComponentsPickers.init(); 
$('.fullscreen').click(function(event){ 
	$('select.form-select').select2({
	    placeholder: "Alege",
	    allowClear: true 
	}); 
	var closest_div = $(this).closest('.bg-inverse');

	if(! closest_div.hasClass('portlet-fullscreen') ){ 
	   closest_div.find('#context').find('.row').find('.col-md-6').removeClass('col-md-6').addClass('col-md-4')
	}else{
		closest_div.find('#context').find('.row').find('.col-md-4').removeClass('col-md-4').addClass('col-md-6')
	}	
}) 
@stop