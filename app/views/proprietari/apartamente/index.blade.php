@extends('~layouts.datatable.index')
@section('datatable-specific-page-jquery-initializations')


$('[name=tip_imobil]').on('change', function(e){
	var caz = parseInt($(this).val());
	console.log(caz);
	switch(caz) {
		// Apartament
		// Garsoniera
		// Casa
		// Duplex
		// Teren
		case 1://apartament
			$('.apartamente').show();
			$('.casa').hide();
			$('.optional').show();
			break;
		case 2://garsoniera
			$('apartamente').hide();
			$('.optional').hide();
			break;
		case 3://casa
		case 4://duplex
			$('.apartamente,.casa').show();
			$('.optional').show();
			break;
		case 5://teren
			$('.apartamente').show();
			$('.optional').hide(); 
			break;
	}
});	


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