function BANCA( parameters )
{
	$('#iban').on('change', function(){
		var option = $(this).find('option:selected').text(); 
		$('#denumire').val( option.substr(option.indexOf('-') + 1) );
	});
}