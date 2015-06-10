function CautareApartamente( parameters )
{

	this.dt = parameters.dt; // datatable object

	
	var my = this;
	// alert(this.dt.page());


	$('#test-api').click(function(){
		var table = my.dt;
		
		table
			.columns(1).search($('#oferta_valabila').prop('checked') ? $('#oferta_valabila').data('on') : $('#oferta_valabila').data('off'))
			.columns(2).search($('#adresa_exacta').val())
			.columns(3).search($('#is_agentie').prop('checked') ? $('#is_agentie').data('on') : $('#is_agentie').data('off'))
			.draw();
	});

	

}