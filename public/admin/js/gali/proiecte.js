function PROIECTE( parameters )
{
	this.reprezentanti_url   = parameters.get_reprezentanti_url;
	this.banci_url           = parameters.get_banci_url;
	
	this.onChangeBeneficiar = function( event, id_beneficiar, id_reprezentant, id_banca)
	{
		var combobox_reprezentanti = new COMBOBOX({
			'url'     : this.reprezentanti_url,
			'id'      : id_beneficiar,
			'control' : '#id_reprezentant',
			'model'   : '\\Gal\\Nomenclatoare\\GalReprezentantLegal',
			'field'   : 'nume'
		});
		combobox_reprezentanti.populate(id_reprezentant);

		var combobox_banci = new COMBOBOX({
			'url'     : this.banci_url,
			'id'      : id_beneficiar,
			'control' : '#id_banca',
			'model'   : '\\Gal\\Nomenclatoare\\GalBanca',
			'field'   : 'denumire'
		});
		combobox_banci.populate(id_banca);
	};
}