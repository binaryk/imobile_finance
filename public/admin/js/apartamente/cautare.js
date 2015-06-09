function CautareApartamente( parameters )
{

	this.dt = parameters.dt; // datatable object

	
	var my = this;
	// alert(this.dt.page());


	$('#test-api').click(function(){
		var table = my.dt;

		table
        .columns(1)
        .search(1)
        .draw();
	});

	

}