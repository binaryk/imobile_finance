function GALI( parameters )
{

	this.regiuniurl    = parameters.get_regiuni_url;
	this.judeteurl     = parameters.get_judete_url;
	this.localitatiurl = parameters.get_localitati_url;
	
	this.onChangeTara = function( event, id_tara, id_regiune)
	{
		var combobox = new COMBOBOX({
			'url'     : this.regiuniurl,
			'id'      : id_tara,
			'control' : '#id_regiune',
			'model'   : '\\Gal\\Nomenclatoare\\Regiune',
			'field'   : 'denumire'
		});
		combobox.populate(id_regiune);
	};

	this.onChangeRegiune = function( event, id_regiune, id_judet)
	{
		var combobox = new COMBOBOX({
			'url'     : this.judeteurl,
			'id'      : id_regiune,
			'control' : '#id_judet',
			'model'   : '\\Gal\\Nomenclatoare\\Judet',
			'field'   : 'denumire'
		});
		console.log('Populate judete for regiune ' + id_regiune + '(Value: ' + id_judet + ')'  );
		console.log(combobox);
		combobox.populate(id_judet);
	};

	this.onChangeJudet = function( event, id_judet, id_localitate)
	{
		var combobox = new COMBOBOX({
			'url'     : this.localitatiurl,
			'id'      : id_judet,
			'control' : '#id_localitate',
			'model'   : '\\Gal\\Nomenclatoare\\Localitate',
			'field'   : 'denumire'
		});
		combobox.populate(id_localitate);
	};
}
