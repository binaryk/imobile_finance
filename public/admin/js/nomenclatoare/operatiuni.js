function OPERATIUNI( updateurl)
{

	this.updateurl     = updateurl;
	
	this.tip_proceduri = 
		new SELECT2('#proceduri_achizitii_ids')
		.placeholder('Selecteaza tipurile de proceduri de achiziţii pentru operaţiune')
		.init()
		;

	$(document).on( 'change', '.inline-operatiuni-change-tip-finantare', function(){
		var update = new UPDATE(
			updateurl, 
			$(this).data('model'), 
			{
			'id' : $(this).data('record-id'),
			'id_tip_cf' : ($(this).val() == 0 ? '%%%NULL%%%' : $(this).val()) 
			},
			function(result){},
			function(result){}
		);
	});

}