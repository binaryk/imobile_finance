function AVERTIZARI_CONFIG()
{
	$('#termen').inputmask('Regex', { regex: "^[0-9][0-9][0-9]" });

	$('#culoare option').each( function(i){
		if( $(this).attr('value') != '0')
		{
			var color = $(this).attr('value');
			$(this).css({'background-color' : color});
		}
	});

	$('#culoare').change( function(){
		var color = $(this).val();
		if( color == '0') 
		{
			color = '#ffffff';
		}
		$(this).css({'background-color' : color });
	});
}