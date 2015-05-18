function DECLARATIIESALONARE( parameters )
{
	this.form              = parameters.form;
	this.numar_declaratii  = parameters.numar_declaratii;
	this.ultima_declaratie = parameters.ultima_declaratie;

	var my = this;

	$('#solicita_avans').on('change', function() {
		if( $(this).val() == 0 )
		{
			$('#valoare_avans_solicitat_lei').val('').prop('disabled', true).closest('div').hide();
		}
		else
		{
			$('#valoare_avans_solicitat_lei').prop('disabled', false).closest('div').show();
		}
	});

	this.form.aftershow = function(record, action){
		if( my.numar_declaratii == 0 )
		{
			$('#id_tip_declaratie').val(1).prop('disabled', true);
		}
		else
		{
			$('#valoare_avans_solicitat_lei').val(my.ultima_declaratie.valoare_avans_solicitat_lei);
			$('#id_tip_declaratie').val(2).prop('disabled', true);	
		}
		$('#observatii').val(my.ultima_declaratie.observatii);
	};

	this.form.afterdatasource = function(record)
	{
		if( record.data_dep_de)
		{
			var ddd = moment(record.data_dep_de, 'DD.MM.YYYY');
			record.data_dep_de = ddd.format('YYYY-MM-DD');
		}
		console.log(record);
		return record;
	}

	this.form.refresh = 2;

	$('#data_dep_de').datepicker({
		language: "ro", 
		format: "dd.mm.yyyy", 
		autoclose: true,
		startDate: moment(this.ultima_declaratie.data_dep_de, 'YYYY-MM-DD').add(1, 'days').format('DD.MM.YYYY') 
	});

	$('#valoare_avans_solicitat_lei').css({'text-align':'right'}).inputmask('decimal', { 
		radixPoint     : ',',
		digits         : 2,
		groupSeparator : '.',
		autoGroup      : true,
		suffix         : ' LEI'
	});

	$('#solicita_avans').trigger('change');
}