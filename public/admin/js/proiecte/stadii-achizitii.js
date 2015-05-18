function STADIIACHIZITIE( parameters )
{
	this.form          = parameters.form;
	this.inputs        = parameters.inputs;
	this.stadii        = parameters.stadii;
	this.stadiu_curent = parameters.stadiu_curent;

	this.showControls = function(stadiu)
	{
		var inputs = this.inputs['stadiu_' + stadiu];
		for(var field in inputs)
		{
			$('#' + field).closest('div').parent().hide();
			if( inputs[field] == 1)
			{
				$('#' + field).closest('div').parent().show();
			}
		}
	}

	$('#stadiu-achizitie-radios input[type="radio"]').on('ifChanged', function(ev){
		var value = $(this).val();
		
		$('.stadiu-achizitie-controls').hide();
		$('#id_tip_stadiu').val(value).trigger('change');
		$('#stadiu-achizitie-form-' + value).show();
		$('#informare').val(
			( self.stadii[value - 1].informare_tn != null ? self.stadii[value - 1].informare_tn : '') + '. ' + 
			( self.stadii[value - 1].informare_td != null ? self.stadii[value - 1].informare_td : '')
		);
		self.showControls( value);
		
	});

	this.form.aftershow = function(record, action)
	{
		$('#id_tip_stadiu').hide();
		if( action == 'delete' )
		{
			// $('#stadiu-achizitie-radios input[type="radio"]').prop('disabled', true);
			$('#rad_id_tip_stadiu_' + record.id_tip_stadiu).iCheck('check').iCheck('update').prop('disabled', true);
		}
	}

	this.form.afterdatasource = function(record)
	{
		if( record.data_stadiu)
		{
			var ds = moment(record.data_stadiu, 'DD.MM.YYYY');
			record.data_stadiu = ds.format('YYYY-MM-DD');
		}
		return record;
	}

	$('.stadiu_curent label').css({'color':'green', 'font-weight' : 'bold'});
	$('.stadiu_blocat label').css({'color':'red', 'font-weight' : 'bold', 'text-decoration':'line-through'});
	$('#motiv, #informare, #recomandari').height(50);

	$('#data_stadiu').datepicker({
		language: "ro", 
		format: "dd.mm.yyyy", 
		autoclose: true,
		startDate: moment(this.stadiu_curent.data_stadiu, 'YYYY-MM-DD').add(1, 'days').format('DD.MM.YYYY')
	});
	$('#val_contractata,#valoare_nerambursabila,#valoare_avizata_contract_achizitie').css({'text-align':'right'}).inputmask('decimal', { 
		radixPoint     : ',',
		digits         : 2,
		groupSeparator : '.',
		autoGroup      : true,
		suffix         : ' LEI'
	});


	$('#data_stadiu, #val_contractata, #valoare_nerambursabila, #motiv, #numar_inregistrare, #recomandari, #termen_realizare_contract_achizitie, #valoare_avizata_contract_achizitie,#informare').closest('div').parent().hide();


	var self = this;
	this.form.refresh = 2;
}