<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<button class="todo">Parseaza</button>
		<button class="sumbmit">Trimite</button>
	</div>
</body>

<script type="text/javascript">
	/* 
//dbf to xml convertit cu ajutorulu programului dbf manager
//php care scoate ghilimelele din XML
	$json = file_get_contents('test/baza_dbf_xml.xml');

	$pattern = "/\"/";

	
	$json_out = preg_replace($pattern, '', $json);

	file_put_contents('test/out.xml',$json_out);

	echo 'Success';
 */
/* 
	//node js pentru a prelua xml-ul si a-l trimite in UI
	var express = require('express');
	var app = express();
	var server = app.listen(3000);
	var fs = require('fs');
	var file = 'in.json';
	var file_out = 'out.json';
	app.use(express.static(__dirname+ '\\bower_compnents'));
	var parseString = require('xml2js');
	var util = require('util');
	var parser = new parseString.Parser();
	var apartamente = [];
	fs.readFile(__dirname + '/out.xml', function(err, data) {
	    parser.parseString(data);
	});
	parser.addListener('end', function(result) {
	    // console.log(util.inspect(result, false, null)) 
	    ob = result 
	    console.log('Dones.');
	});
	app.get('/data', function (req, res) {
	  res.json(ob);
	});
	app.post('/data', function (req, res) {
	  console.log(req);
	  console.log(res);
	  res.json("success");

	});


	app.get('/', function (req, res) {
	  console.log('click');
	  res.sendFile(__dirname+"/index.html");
	}); */
	jQuery(document).ready(function($) {
		var apartamente = [];
		var types = [
		{ PRET_NEGOC : 'unique' },
		{ VALABILITA : 'unique' },
		{ AGENTIE_IM : 'unique' },
		{ D1 : 'unique' },
		{ D2 : 'unique' },
		{ D3 : 'unique' },
		{ DEZVOLTATO : 'unique' },
		{ EXTRAS_CF  : 'unique' },
		{ GRESIE_NOU : 'unique' },
		{ FAIANTA_NO : 'unique' },
		{ PARCHET_NO : 'unique' },
		{ ZUGRAVIT_L : 'unique' },
		{ DOTARI 	 : 'unique' },
		{ USA_METALI : 'unique' },
		{ CENTRALA_T : 'unique' },
		{ FERESTRE_T : 'unique' },
		{ ELECTROCAS : 'unique' },
		{ LOC_PARCAR : 'unique' },
		{ EXISTENTA_ : 'unique' },
		{ ACCEPTARE_ : 'unique' },
		{ BECI : 'unique' },
		{ TERASA : 'unique' },
		{ EXISTENTA : 'unique' },
		{ ID_JUDET : 'id_judet' },
		{ ID_CARTIER : 'id_cartier' },
		{ NUMAR_DE_C : 'camere' },
		{ TIP_CLADIR : 'tip_cladire' },//vechime_imobil
		{ PRET_DE_VA : 'pret_m2' }, 
		{ DATA_APARI : 'created_at' }, 
		{ DATA_ULTIM : 'ultima_actualizare' },// 
		{ TELEFON_DE : 'telefon' },//telefon proprietar
		{ ETAJ_APART : 'nr_etaj' },
		{ COMPARTIME : 'id_tip_compartiment' },
		{ SUPRAFATA_ : 'suprafata' },
		{ FINISAJE_E : 'id_tip_finisaje_externe' },
		{ FINISAJE_I : 'id_tip_finisaje_interioare' },
		{ MOBILARE   : 'id_tip_mobilare' },
		{ OBSERVATI0 : 'detalii_private' }, 
		{ OSERVATII_ : 'detalii' },
		{ NUMAR_APAR : 'nr_apartament' }, 
		{ NUMAR_CLAD : 'nr_cladire' }, 
		{ STRADA_CLA : 'strada' },  
		{ NUMAR_ETAJ : 'nr_etaje_cladire' } 
		];
		var properties = { 
		unique: [
			{ PRET_NEGOC : 'negociabil'},
			{ VALABILITA : 'oferta_valabila'},
			{ AGENTIE_IM : 'is_agentie'},
			// { D1 : ''},
			// { D2 : ''},
			// { D3 : ''},
			{ DEZVOLTATO : 'id_dezvoltator'},
			{ EXTRAS_CF : 'extras_cf'},
			{ GRESIE_NOU : 'gresie'},
			{ FAIANTA_NO : 'faianta'},
			{ PARCHET_NO : 'parchet'},
			{ ZUGRAVIT_L : 'zugravit_lavabil'},
			{ DOTARI : 'has_dotari'},
			{ USA_METALI : 'usa_atiefractie'},
			{ CENTRALA_T : 'centrala_termica'},
			{ FERESTRE_T : 'termopan'},
			{ ELECTROCAS : 'has_electrocasnice'},
			{ LOC_PARCAR : 'parcare'},
			{ BECI : 'loc_pivnita'},
			{ TERASA : 'has_terasa'},
			{ EXISTENTA_ :'has_balcon'} 

		],
		id_judet: [
			{ JUD00000 : 12 },
			{ JUD00001 : 1 },
			{ JUD00002 : 26 },
			{ JUD00003 : 0 },
			{ JUD00004 : 6 },
			{ JUD00005 : 8 },
			{ JUD00006 : 40 },
			{ JUD00007 : 40 },
			{ JUD00008 : 24 },
			{ JUD00009 : 31 },
			{ JUD00010 : 5 },
			{ JUD00011 : 20 },
			{ JUD00012 : 20 },
			{ JUD00013 : 33 },
			{ JUD00014 : 30 },
			{ JUD00015 : 30 },
			{ JUD00016 : 27 },
			{ JUD00017 : 17 },
			{ JUD00018 : 19 },
			{ JUD00019 : 26 },
			{ JUD00020 : 19 },
			{ JUD00021 : 35 },
			{ JUD00022 : 7 } 
		],
		id_cartier:[
			{ CAR00001 : 1 },
			{ CAR00002 : 2 },
			{ CAR00004 : 5 },
			{ CAR00007 : 4 },
			{ CAR00008 : 6 },
			{ CAR00009 : 3 },
			{ CAR00011 : 7 },
			{ CAR00018 : 9 },
			{ CAR00020 : 10 },
			{ CAR00022 : 12 },
			{ CAR00026 : 11 },
			{ CAR00029 : 14 },
			{ CAR00032 : 15 },
			{ CAR00033 : 13 },
			{ CAR00037 : 17 },
			{ CAR00038 : 16 },
			{ CAR00047 : 18 },
			{ CAR00048 : 19 },
			{ CAR00053 : 20 },
			{ CAR00054 : 20 },
			{ CAR00057 : 21 },
			{ CAR00067 : 23 },
			{ CAR00072 : 1 } 
		],

		tip_cladire:[
			{ Bloc_Nou   : 1 },
			{ Bloc_Vechi : 0 }
		],
		id_tip_compartiment : [
			{ Decomandat : 1 },
			{ Semidecomandat : 2 },
			{ Nedecomandat : 3 },
			{ In_Circuit : 4 },
			{ Vagon : 5 },
		],
		id_tip_finisaje_externe : [
			{ Cladire_izolata_termic : 1 },
			{ Apartament_izolat_termic: 2 },
		],
		id_tip_finisaje_interioare : [
			{ Nefinisat : 1 },
			{ Semifinisat : 2 },
			{ Finisat : 3 },
			{ Superfinisat : 4 },
		],
		id_tip_mobilare : [
			{ Da : 1 },
            { Nemobilat : 2 },
            { Semimobilat : 3 },
            { Mobilat : 4 },
            { Supermobilat : 5 },
		]



		};

		$('.todo').click(function(){
			   $.get('http://localhost:3000/data', {}, function(data){
					var temp = [];
			   		temp = data.VFPData.RECORD;
			   		console.log(temp[0].DATA_ULTIM[0]);

			   		for (var i = 0; i < temp.length; i++) {
			   			if(temp[i].DATA_ULTIM)
			   				if(temp[i].DATA_ULTIM[0])
					   			if( temp[i].DATA_ULTIM[0].indexOf('2014') > 0 || temp[i].DATA_ULTIM[0].indexOf('2015') > 0 )
					   				apartamente.push(temp[i]);
			   		}


			   		for (var i = 0; i < apartamente.length; i++) {
			   			var ap = apartamente[i];
			   			// merg peste toate proprietatile necesare
			   			for(var k = 0; k < types.length; k++){
			   				for(var propertyName in types[k]) {
			   					var type = types[k][propertyName];
			   					// vad tipul de proprietate (da/nu, judet etc.)
				   				switch(type) {
				   					case 'unique':
   						   				var value = null;
   						   				if(ap[propertyName])
   						   					value = ap[propertyName][0] ? ap[propertyName][0] : null;
   							   				switch(value) {
   							   					case 'DA':
   							   					case 'da':
   							   						ap[propertyName] = '1';
   							   						break;
   							   					case 'NU':
   							   					case 'nu':
   							   						ap[propertyName] = '0';
   							   						break;
   							   					default:
   							   						ap[propertyName] = '';
   							   				} 
				   						break;
				   					case 'id_cartier':
				   					case 'id_judet':
				   					case 'tip_cladire':
				   					case 'id_tip_compartiment':
				   					case 'id_tip_finisaje_externe':
				   					case 'id_tip_finisaje_interioare':
				   					case 'id_tip_mobilare':
				   						var value = null;
				   						if(ap[propertyName])
				   							value = ap[propertyName][0] ? ap[propertyName][0] : null;
				   						// in value am valoarea din vechea aplicatie
				   						if(!value)
				   							ap[propertyName] = 0;
				   						else{
			   								// deoarece avem 'Bloc Nou ==> Bloc_Nou'
				   							value = value.toLocaleLowerCase().replace(/ /g , "_");
					   						for( var j = 0; j < properties[type].length; j++ ){
					   							for(var judetId in properties[type][j]) {
					   								if(judetId.toLocaleLowerCase() == value){
					   									ap[propertyName] = properties[type][j][judetId];
					   								}
					   							}
					   						}
				   						}
				   							
				   						break;
				   					case 'camere':
				   					case 'pret_m2':
				   					case 'created_at':
				   					case 'ultima_actualizare':
				   					case 'telefon':
				   					case 'nr_etaj':
				   					case 'suprafata':
				   					case 'detalii':
				   					case 'detalii_private':
				   					case 'nr_apartament':
				   					case 'nr_cladire':
				   					case 'strada':
				   					case 'nr_etaje_cladire':
				   						var value = null;
				   						if(ap[propertyName])
				   							value = ap[propertyName][0] ? ap[propertyName][0] : null;
				   						if(!value)
				   							ap[propertyName] = '';
				   						else				   						
				   							ap[propertyName] = value;
				   					break; 
				   				}

			   				}
			   			}
			   			
			   		}
			   		console.log(apartamente.length);
			   		console.log(apartamente);
			   		
			   });

			$('.sumbmit').click(function(event) {
				$.ajax({
                    type: 'POST',
                    url: 'http://localhost:3000/data',
                    data: "apartamente",
                    dataType: 'json',
                    success: function(data) {
                        console.log('success');
                        console.log(data);
                    }
                }); 
			});

		}); 

	}); 
</script>

</html>