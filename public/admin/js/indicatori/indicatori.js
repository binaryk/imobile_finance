function INDICATORI( parameters )
{
	this.id_general     = parameters.id_general;
	this.updateurl      = parameters.updateurl;
	this.dt             = parameters.dt;

	this.valori_posibile = 
		new SELECT2('#valori_posibile')
		.placeholder('Selectează valorile posibile pentru indicator')
		.init()
		;

	$('.col-valori-posibile').hide();

	$('#box-indicatori-details .box-header').addClass('bg-' + this.id_general);


	$(document).on( 'change', '#id_tip', function(){
		if( $(this).val() == 3 ) // multioptiune
		{
			$('.col-valori-posibile').show();
		}
		else
		{
			$('.col-valori-posibile').hide();	
		}
	});

	$(document).off('click', '.edit-denumire').on( 'click', '.edit-denumire', function(){
		var inline_edit = new INLINEEDIT( $(this), parameters.updateurl, parameters.dt );
	});

	$(document).on( 'change', '.inline-operatiuni-change-tip-indicator', function(){
		var update = new UPDATE(
			parameters.updateurl, 
			$(this).data('model'), 
			{
			'id' : $(this).data('record-id'),
			'id_tip' : ($(this).val() == 0 ? '%%%NULL%%%' : $(this).val()),
			},
			function(result){parameters.dt.draw( false ); },
			function(result){}
		);
	});

}