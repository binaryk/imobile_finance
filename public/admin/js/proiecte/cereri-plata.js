function CERERIPLATA( parameters )
{
	this.totalizer 		   = parameters.totalizer;
	this.datatable 		   = parameters.table;
	this.sume      		   = new TOTALIZER(this.totalizer);
	this.form              = parameters.form;
	this.cereri_plata      = parameters.cereri_plata;
	this.ultima_declaratie = parameters.ultima_declaratie;
	this.ultima_cerere     = parameters.ultima_cerere;

	var my = this;
	this.form.refresh = 2;

	this.bindtotalize = function()
	{
		this.datatable.on('draw.dt', function(event, settings){ 
			my.sume.calculate( $('div.dataTables_filter input').val() ); 
		});
	}

	this.tipCererePlata = function()
	{
		var tip_cerere = 2; // presupunem ca este CERERE DE PLATA
		if(this.ultima_declaratie.solicita_avans == 1) // se solicita avans
		{
			if( this.cereri_plata.length == 0) // este prima cerere de plata => trebuie sa fie CERERE DE AVANS
			{
				tip_cerere = 1;
			}
		}
		return tip_cerere;
	}

	this.numarTransa = function()
	{
		if( this.cereri_plata.length == 0 )
		{
			if(this.ultima_declaratie.solicita_avans == 1)
			{
				return 0;
			}
			return 1;
		}
		return 1 + parseInt(this.ultima_cerere.nr_transe_plata);
	}

	this.form.aftershow = function(record, action){
		if( action == 'insert')
		{
			console.log('Insert after show --> tip + nr_transa >>>> ' + my.ultima_cerere.data_dep_cp);
			$('#id_tip_cerere').val(my.tipCererePlata());
			$('#nr_transe_plata').val(my.numarTransa());
			$('#data_dep_cp,#data_valoare_solicitata,#data_valoare_aprobata,#data_valoare_aferenta').datepicker({
				language: "ro", 
				format: "dd.mm.yyyy", 
				autoclose: true,
				startDate: moment(my.ultima_cerere.data_dep_cp, 'YYYY-MM-DD').add(1, 'days').format('DD.MM.YYYY') 
			});
		}
		else
		{
			$('#data_dep_cp,#data_valoare_solicitata,#data_valoare_aprobata,#data_valoare_aferenta').datepicker({
				language: "ro", 
				format: "dd.mm.yyyy", 
				autoclose: true
			});
		}
		$('#id_tip_cerere').prop('disabled', true);
		$('#nr_transe_plata').css({'text-align':'right'}).prop('disabled', true)
	};

	
	this.form.afterdatasource = function(record)
	{
		console.log('A)   ', record);
		if( record.data_dep_cp)
		{
			// var ddcp = moment(record.data_dep_cp, 'DD.MM.YYYY');
			// record.data_dep_cp = ddcp.format('YYYY-MM-DD');
		}
		if( record.data_valoare_solicitata)
		{
			// var ddcp = moment(record.data_valoare_solicitata, 'DD.MM.YYYY');
			// record.data_valoare_solicitata = ddcp.format('YYYY-MM-DD');
		}
		if( record.data_valoare_aprobata)
		{
			// var ddcp = moment(record.data_valoare_aprobata, 'DD.MM.YYYY');
			// record.data_valoare_aprobata = ddcp.format('YYYY-MM-DD');
		}
		if( record.data_valoare_aferenta)
		{
			// var ddcp = moment(record.data_valoare_aferenta, 'DD.MM.YYYY');
			// record.data_valoare_aferenta = ddcp.format('YYYY-MM-DD');
		}
		console.log('B)   ', record);
		return record;
	}
	
	


	$('#valoare_cerere_plata,#valoare_aprobata_aferenta,#valoare_platita_aferenta').css({'text-align':'right'}).inputmask('decimal', { 
		radixPoint     : ',',
		digits         : 2,
		groupSeparator : '.',
		autoGroup      : true,
		suffix         : ' LEI'
	});

	this.bindtotalize();
}