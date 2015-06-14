function CautareApartamente( parameters )
{
	this.dt = parameters.dt; 
	
	var my = this;


	/* 1 -> oferta valabila */
	this.oferta_valabila = function()
	{
		var value = $('#oferta_valabila').val();
		if(value == -1)
		{
			return '';
		}
		return 'v_apartamente.oferta_valabila = ' + value;
	}

	/* 2 -> adresa exacta */
	this.adresa_exacta = function()
	{
		var value = $('#adresa_exacta').val();
		if(value.length == 0)
		{
			return '';
		}
		return "v_apartamente.adresa_exacta LIKE '%" + value + "%'";
	}

	/* 3 -> numar camere */
	this.numar_camere = function()
	{
		var nr1 = $('#nr_camere_min').val();
		var nr2 = $('#nr_camere_max').val();
		if( (nr1.length == 0) && (nr2.length == 0) )
		{
			return '';
		}
		if( (nr1.length > 0) && (nr2.length > 0) )
		{
			nr1 = parseInt(nr1); 
			nr2 = parseInt(nr2); 
			return 'v_apartamente.nr_camere BETWEEN ' + nr1 + ' AND ' + nr2;
		}
		if(nr1.length > 0)
		{
			nr1 = parseInt(nr1); 
			return 'v_apartamente.nr_camere >= ' + nr1;;
		}
		nr2 = parseInt(nr2); 
		return 'v_apartamente.nr_camere <= ' + nr2;
	}

	/* 4 -> pret */
	this.pret = function()
	{
		var nr1 = $('#pret_m2_min').val();
		var nr2 = $('#pret_m2_max').val();
		if( (nr1.length == 0) && (nr2.length == 0) )
		{
			return '';
		}
		if( (nr1.length > 0) && (nr2.length > 0) )
		{
			nr1 = parseInt(nr1); 
			nr2 = parseInt(nr2); 
			return 'v_apartamente.pret_m2 BETWEEN ' + nr1 + ' AND ' + nr2;
		}
		if(nr1.length > 0)
		{
			nr1 = parseInt(nr1); 
			return 'v_apartamente.pret_m2 >= ' + nr1;;
		}
		nr2 = parseInt(nr2); 
		return 'v_apartamente.pret_m2 <= ' + nr2;
	}

	/* 5 -> is agentie */
	this.is_agentie = function()
	{
		var value = $('#is_agentie').val();
		if(value == -1)
		{
			return '';
		}
		return 'v_apartamente.is_agentie = ' + value;
	}

	/* 6 -> ultima_actualizare */
	this.ultima_actualizare = function()
	{
		var perioada = $('#perioada').data('daterangepicker');
		var d1 = perioada.startDate.format('YYYY-MM-DD');
		var d2 = perioada.endDate.format('YYYY-MM-DD');
		return "v_apartamente.ultima_actualizare BETWEEN '" + d1 + "' AND '" + d2 + "'";
	}

	/* 7 -> telefoane */
	this.telefoane = function()
	{
		var value = $('#telefon').val();
		if(value.length == 0)
		{
			return '';
		}
		return "(v_apartamente.telefon LIKE '%" + value + "%') OR (v_apartamente.telefon_secundar_1 LIKE '%" + value + "%') OR (v_apartamente.telefon_secundar_2 LIKE '%" + value + "%')";
	}

	/* 8 -> credit prima casa */
	this.credit_prima_casa = function()
	{
		var value = $('#credit_prima_casa').val();
		if(value == -1)
		{
			return '';
		}
		return 'v_apartamente.credit_prima_casa = ' + value;
	}

	/* 9 -> numar etaje */
	this.numar_etaje = function()
	{
		var nr1 = $('#nr_etaj_min').val();
		var nr2 = $('#nr_etaj_max').val();
		if( (nr1.length == 0) && (nr2.length == 0) )
		{
			return '';
		}
		if( (nr1.length > 0) && (nr2.length > 0) )
		{
			nr1 = parseInt(nr1); 
			nr2 = parseInt(nr2); 
			return 'v_apartamente.nr_etaj BETWEEN ' + nr1 + ' AND ' + nr2;
		}
		if(nr1.length > 0)
		{
			nr1 = parseInt(nr1); 
			return 'v_apartamente.nr_etaj >= ' + nr1;;
		}
		nr2 = parseInt(nr2); 
		return 'v_apartamente.nr_etaj <= ' + nr2;
	}

	/* 10 -> tip finisaj interior */
	this.tip_finisaj_interior = function()
	{
		var value = $('#id_tip_finisaje_interioare').val();
		if(value == 0)
		{
			return '';
		}
		return 'v_apartamente.id_tip_finisaje_interioare = ' + value;
	}

	/* 11 -> tip compartiment */
	this.tip_compartimentare = function()
	{
		var value = $('#id_tip_compartiment').val();
		if(value == 0)
		{
			return '';
		}
		return 'v_apartamente.id_tip_compartiment = ' + value;
	}

	$('#test-api').click(function(){
		var table = my.dt;
		
		table
			.columns(1).search( my.oferta_valabila() ) 		 /*  1 -> oferta valabila */
			.columns(2).search( my.adresa_exacta() )   		 /*  2 -> adresa exacta   */
			.columns(3).search( my.numar_camere() )    		 /*  3 -> numarul de camare   */
			.columns(4).search( my.pret() )            		 /*  4 -> pretul   */
			.columns(5).search( my.is_agentie() )      		 /*  5 -> is agentie   */
			.columns(6).search( my.ultima_actualizare() )    /*  6 -> ultima_actualizare   */
			.columns(7).search( my.telefoane() )       		 /*  7 -> telefoane   */
			.columns(8).search( my.credit_prima_casa() )     /*  8 -> credit prima casa   */
			.columns(9).search( my.numar_etaje() )           /*  9 -> numar etaje   */
			.columns(10).search( my.tip_finisaj_interior() ) /* 10 -> tip finisaj interior   */
			.columns(11).search( my.tip_compartimentare() )  /* 11 -> tip compartimentare   */

			.draw();
	});
}