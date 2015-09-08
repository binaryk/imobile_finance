@extends('~layouts.datatable.index')
@section('datatable-specific-page-jquery-initializations')


$('[name=tip_imobil]').on('change', function(e){
	var caz = parseInt($(this).val()); 
	switch(caz) {
		case 1://apartament
		case 2://garsoniera
		case 6://vila
			$('.apartamente').show();
			$('.casa').hide();
			$('.optional').show();
			$('.teren').hide();
			$('.no_teren').show();
			break; 
		case 3://casa
		case 4://duplex
			$('.apartamente,.casa').show();
			$('.optional').show();
			$('.teren').hide();
			$('.no_teren').show();
			break;
		case 5://teren
			$('.apartamente').show();
			$('.teren').show();
			$('.casa').show();//suprafata teren
			$('.optional').hide(); 
			$('.no_teren').hide(); 
			break;
		default:
			$('.apartamente').hide();
			$('.optional').hide(); 
			$('.teren').hide(); 

	}
});	

form.aftershow = function(record, action){
	if( action == 'insert' ){
		$('select').select2("val", "");
		$('.apartamente').hide();
		$('[name=tip_imobil]').select2('val',1);
		$('.apartamente').show();
		$('.casa').hide();
		$('.optional').show();
		$('.teren').hide();
		$('.no_teren').show();
	}
	if( action == 'update' ){
		$('[name=tip_imobil]').attr('disabled','disabled');
	} 
}


FormiCheck.init();
$('select.form-select').select2({
    placeholder: "Alege",
    allowClear: true 
}); 
if (jQuery().datepicker) {
$('#ultima_actualizare').datepicker(
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