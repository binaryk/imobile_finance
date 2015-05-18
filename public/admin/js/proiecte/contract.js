function CONTRACT( parameters )
{

	this.ajax_update_url      = parameters['update-url'];
	this.id_gal               = parameters['id-gal'];
	this.id_user              = parameters['id-user'];
	this.contract             = parameters['record'];
	this.section              = 0;
	this.datafinala           = parameters['data-finala'];

	this.record = function(section)
	{
		console.log('Section ==> ' + section);
		var result = {id : this.contract.id, 'updated_by' : this.id_user};
		var fields = $('.data-source').each(function(i){
			if( $(this).hasClass('section-' + section) )
			{
				var value = $(this).val();
				switch( $(this).data('control-type') )
				{
					case 'checkbox' : 
						value = $(this).prop('checked') ? $(this).data('on') : $(this).data('off');
						break;
				}
				if( $(this).hasClass('replace') )
				{
					value = value.replace(/\./g, '').replace(/\,/g, '.').replace('%', '').replace('LEI', '').replace('luni', '');
				}
				result[ $(this).data('control-source') ] = value;
			}
		});

		if( section == 2)
		{
			var parts = result['data_vigoare'].split('.');
			var datavigoare = new Date(parts[2], parts[1] - 1, parts[0]);
			result['data_vigoare'] = datavigoare.toString('yyyy-MM-dd');
		}
		console.log(result);
		return result;
	}

	this.onSuccess = function(result)
	{
		$('.box-date-contract .alert-success-' + self.section).show();
	}

	this.onError = function(result)
	{
		$('.box-date-contract .alert-error-' + self.section).show();
	}

	this.save = function(section)
	{
		this.section = section;
		var update = new UPDATE(
			this.ajax_update_url, 
			'Gal|Nomenclatoare|Contract', 
			this.record(section), 
			this.onSuccess,
			this.onError
		);
	}

	this.showFieldsErrors = function(fieldserrors)
	{
		for(field in fieldserrors)
		{
			var control   = $('.data-source[data-control-source="' + field + '"]');
			switch( control.data('control-type') )
			{
				case 'textbox'   :
				case 'combobox'  :
				case 'editbox'   :
				case 'select2'   :
				case 'password'  :
					var formgroup = control.closest('.form-group');
					if(formgroup.length > 0)
					{
						formgroup.find('.error-sign').remove();
						formgroup.find('.help-block').remove();
						formgroup.addClass('has-error')
							.prepend('<label class="control-label error-sign" for="'+ field + '"><i class="fa fa-times-circle-o"></i></label>')
							.append('<p class="help-block has-error">' + fieldserrors[field] + '</p>');
					}
					var formgroup = control.closest('.input-group').parent();
					if(formgroup.length > 0)
					{
						formgroup.find('.error-sign').remove();
						formgroup.find('.help-block').remove();
						formgroup.addClass('has-error')
							.prepend('<label class="control-label error-sign" for="'+ field + '"><i class="fa fa-times-circle-o"></i></label>')
							.append('<p class="help-block has-error">' + fieldserrors[field] + '</p>');
					}
					break;
			}
		}
	}

	this.hideFieldsErrors = function()
	{
		var controls   = $('.data-source');
		controls.each(function(i){
			var formgroup = $(this).closest('.form-group');
			if(formgroup.length > 0)
			{
				formgroup.removeClass('has-error');
				formgroup.find('.error-sign').remove();
				formgroup.find('.help-block').remove();
			}
			var formgroup = $(this).closest('.input-group').parent();
			if(formgroup.length > 0)
			{
				formgroup.removeClass('has-error');
				formgroup.find('.error-sign').remove();
				formgroup.find('.help-block').remove();
			}
		})
		$('.alert-error-3, .alert-success-3').hide();
	}

	this.calculate = function()
	{
		$('#durata_implementare').val(this.contract.durata_implementare == 0 ? '' : this.contract.durata_implementare);		

		$('#data-limita-depunere-avizare-dosar-achizitii').html(this.contract.data_limita_depunere_avizare_dosar_achizitii);
		$('#durata-executie-contract').html(this.contract.durata_executie_contract);
		$('#termen-depunere-dosar-achizitii').html(this.contract.termen_depunere_dosar_achizitii);
		$('#durata-valabilitate-contract').html(this.contract.durata_valabilitate_contract);
		$('#interval-depunere-dosar-progres').html(this.contract.interval_depunere_dosar_progres);
		$('#data-limita-depunere-cerere-finala-de-plata').html(this.contract.data_limita_depunere_cerere_finala_de_plata);
		$('#termen-efectuare-ultima-plata').html(this.contract.termen_efectuare_ultima_plata);
		$('#data-finala-monitorizare-contract').html(this.contract.data_finala_monitorizare_contract);
		
		$('#data_vigoare').datepicker('setDate', this.contract.data_vigoare);
		$('#durata-monitorizare-contract').val(this.contract.durata_monitorizare_ani).trigger('change');
	}

	this.DataLimitaDepunereAvizareDosarAchizitii = function()
	{
		var data_vigoare = $('#data_vigoare').datepicker('getDate');
		var nr_luni = $('#termen-depunere-dosar-achizitii').html();
		$('#data-limita-depunere-avizare-dosar-achizitii').html(data_vigoare.add({ days: -1, months: nr_luni }).toString('dd.MM.yyyy'));
	}

	this.DurataExecutieContract = function()
	{
		var durata_implementare = $('#durata_implementare').val().replace(/\_/g, '').replace('luni', '');
		var durata = durata_implementare * 30 + parseInt($('#termen-efectuare-ultima-plata').html());
		$('#durata-executie-contract').html(durata);
	}

	this.DurataValabilitateContract = function()
	{
		
		var durata_monitorizare_contract = $('#durata-monitorizare-contract').val();
		if( ! durata_monitorizare_contract )
		{
			durata_monitorizare_contract = '0';
		}

		var d1 = parseFloat(durata_monitorizare_contract.replace('ani', '')).toFixed(2);
		var d2 = parseFloat($('#durata_implementare').val().replace('luni', '')/12).toFixed(2);
		var d3 = parseFloat($('#termen-efectuare-ultima-plata').html().replace('zile', '')/365).toFixed(2);

		var durata = parseFloat(d1) + parseFloat(d2) + parseFloat(d3);
		if( isNaN(durata) )
		{
			durata = 0;
		}
		durata = durata.toFixed(2).replace('.', ',');
		$('#durata-valabilitate-contract').html(durata);
	}

	this.DataLimitaDepunereCerereFinalaDePlata = function()
	{
		var datalimita = $('#data_vigoare').datepicker('getDate');
		var durata_implementare = $('#durata_implementare').val().replace(/\_/g, '').replace('luni', '');
		datalimita = datalimita.add({ days: -1, months: durata_implementare });
		var parts = this.datafinala.split('-');
		var datafinala = new Date(parts[0], parts[1] - 1, parts[2]);
		var cmp = Date.compare(datalimita, datafinala);
		if( cmp == -1 )
		{
			datafinala = datalimita;
		}
		$('#data-limita-depunere-cerere-finala-de-plata').html(datafinala.toString('dd.MM.yyyy'));
	}

	this.DataFinalaMonitorizareContract = function()
	{
		var now = Date.today();
		now = now.add({ days: $('#durata-executie-contract').val(), months: 0, years :  $('#durata-monitorizare-contract').val() }).add({'days':-1});
		$('#data-finala-monitorizare-contract').html(now.toString('dd.MM.yyyy'));
	}

	this.InteractiveChange = function()
	{
		this.DataLimitaDepunereAvizareDosarAchizitii();
		this.DurataExecutieContract();
		this.DurataValabilitateContract();
		this.DataLimitaDepunereCerereFinalaDePlata();
		this.DataFinalaMonitorizareContract();
	}

	$('.btn-save-date-contract').on('click', function(){
		$('.box-date-contract .alert').hide();
		self.save( $(this).attr('id').replace('btn-save-', '') );
	});

	$('#durata_implementare').keyup( function(ev){
		self.InteractiveChange();
	});

	$('#durata-monitorizare-contract').change( function(){
		self.InteractiveChange();
	});

	

	var self = this;
}