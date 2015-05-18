function ACHIZITII( parameters )
{
	this.totalizer 					= parameters.totalizer;
	this.datatable 					= parameters.table;
	this.sume      					= new TOTALIZER(this.totalizer);
	this.form      					= parameters.form;
	this.tipuri_procedura_achizitii = parameters.tip_procedura_achizitii;
	this.cota_tva                   = parameters.cota_tva;

	this.bindtotalize = function()
	{
		this.datatable.on('draw.dt', function(event, settings){ 
			my.sume.calculate( $('div.dataTables_filter input').val() ); 
		});
	}

	$('#valoare_lei, #valoare_tva_lei').css({'text-align':'right'}).inputmask('decimal', { 
		radixPoint     : ',',
		digits         : 2,
		groupSeparator : '.',
		autoGroup      : true,
		suffix         : ' LEI'
	});

	$('#valoare_eur, #valoare_tva_eur').css({'text-align':'right'}).inputmask('decimal', { 
		radixPoint     : ',',
		digits         : 2,
		groupSeparator : '.',
		autoGroup      : true,
		suffix         : ' EUR'
	});

	this.interactivechange = function(){
		var cota_tva = numeral().unformat($('#cota_tva').val());
		cota_tva = cota_tva/100;
		var val_lei = numeral().unformat($('#valoare_lei').val());
		var curs_valutar = numeral().unformat($('#curs_valutar').val());
		var val_eur = parseFloat(curs_valutar) > 0 ? math.chain(val_lei).divide(curs_valutar).done() : 0;
		var tva_lei = math.chain(val_lei).multiply(cota_tva).done();
		var tva_eur = math.chain(val_eur).multiply(cota_tva).done();
		$('#valoare_eur').val(val_eur.toFixed(2));
		$('#valoare_tva_lei').val(tva_lei.toFixed(2));
		$('#valoare_tva_eur').val(tva_eur.toFixed(2));
	}

	var my = this;
	
	this.bindtotalize();

	$('#valoare_lei').keyup(function(ev){
		my.interactivechange();
	});

	$('#cota_tva').change( function(ev){
		my.interactivechange();
	});

	$('#id_procedura').change( function(ev){
		var days = my.tipuri_procedura_achizitii['tip_' + $(this).val()].days;
		var data_limita_depunere_avizare = moment($('#data-limita-depunere-avizare').html(), "DD.MM.YYYY");
		$('#data-estimativa-depunere').html(data_limita_depunere_avizare.subtract(days, 'days').format('DD.MM.YYYY'));
		$('#numar-zile-data-limita-depunere').html( $('#numar-zile-disponibile').html() - days);
	});



	this.form.aftershow = function(record, action){
		if(action == 'insert')
		{
			$('#cota_tva').val( numeral(my.cota_tva['0']).format('(0,0.00)') );
			$('#id_procedura').val(0);
			$('#tip_contract').val(0);
		}
		$('#valoare_eur,#valoare_tva_lei, #valoare_tva_eur').css({'background-color':'#eee'});
		$('#curs_valutar').css({'text-align':'right'});
		equalize('#body-form-achizitie, #body-date-suplimentare');
	};

	this.form.afterEmptyControls = function(record, action){
		
	};

}