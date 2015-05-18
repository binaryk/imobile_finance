function PROFIL( parameters )
{

	this.ajax_update_url      = parameters['update-url'];
	this.ajax_change_password = parameters['change-password'];
	this.id_gal               = parameters['id-gal'];
	this.id_user              = parameters['id-user'];
	this.section              = 0;

	this.record = function(section)
	{
		
		var result = {id : this.id_gal, 'updated_by' : this.id_user};
		var fields = $('.section-' + section).each(function(i){
			var value = $(this).val();
			switch( $(this).data('control-type') )
			{
				case 'checkbox' : 
					value = $(this).prop('checked') ? $(this).data('on') : $(this).data('off');
					break;
			}

			result[ $(this).data('control-source') ] = value;
		});
		console.log(result);
		return result;
	}

	this.onSuccess = function(result)
	{
		console.log(self.section);
		$('.box-profil .alert-success-' + self.section).show();
	}

	this.onError = function(result)
	{
		$('.box-profil .alert-error-' + self.section).show();
	}

	this.save = function(section)
	{
		this.section = section;
		var update = new UPDATE(
			this.ajax_update_url, 
			'Gal|Nomenclatoare|Gal', 
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

	this.changePasswordOnSuccess = function( result )
	{
		$('.alert-success-3 span').html( result.message );
		$('.alert-success-3').show();
		$('#old_password, #password, #password_confirmed').val('');
		// $('#change-password-form').hide();
		// $('#btn-change-password').hide();
	}

	this.changePasswordOnError = function(result)
	{
		$('.alert-error-3 span').html( result.message );
		$('.alert-error-3').show();
	};

	this.changePassword = function()
	{
		$.ajax({
			url      : self.ajax_change_password,
	        type     : 'post',
	        dataType : 'json',
	        data     : 
	        	{
	        		'id'                 : this.id_user,
	        		'old_password'       : $('#old_password').val(),
	        		'password'           : $('#password').val(),
	        		'password_confirmed' : $('#password_confirmed').val()
	        	},
	        success  : function(result)
	        {
	        	self.hideFieldsErrors();
	        	if( ! result.success )
	        	{
	        		self.changePasswordOnError(result);
	        		self.showFieldsErrors(result.fieldserrors);
	        	}
	        	else
	        	{
	        		self.changePasswordOnSuccess(result);
	        	}
	        }
		});
	}

	$('.btn-save-profile').on('click', function(){
		$('.box-profil .alert').hide();
		self.save( $(this).attr('id').replace('btn-save-', '') );
	});

	$('#btn-change-password').on('click', function(){
		self.changePassword();
	});

	var self = this;
}