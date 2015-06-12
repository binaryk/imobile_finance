<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTerenuri extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('terenuri', function(Blueprint $table)
		{
				$table->increments('id');
				$table->timestamps();
				$table->softdeletes();
				$table->integer('id_localitate')->unsigned()->nullable();
				$table->integer('id_cartier')->unsigned()->nullable();
				$table->integer('id_sector')->unsigned()->nullable();
				$table->integer('id_tip_destinatie_teren')->unsigned()->nullable();//+
				$table->integer('id_tip_categorie_teren')->unsigned()->nullable();//+
				$table->integer('id_imobil')->unsigned()->nullable();//+
				$table->integer('id_tip_clasificare_teren')->unsigned()->nullable();//-
				$table->integer('id_tip_utilitati')->unsigned()->nullable();//-
				$table->double('suprafata_min');
				$table->double('suprafata_max');
				$table->double('fond_stradal_min');
				$table->double('fond_stradal_max');
				$table->double('pret_vanzare');
				$table->tinyinteger('constructie_teren');
				$table->text('detalii_imprejurari');
				$table->text('alte_detalii_zona');//pietruit, asfaltat
				$table->tinyinteger('pret_negociabil');
				$table->tinyinteger('certificat_urbanism');
				$table->text('numar_stradal');
				$table->integer('id_tip_categoria_folosinta_teren');
				$table->integer('numar_parcela');
				$table->text('observatii');
				$table->tinyinteger('iluminat_stradal');
				$table->tinyinteger('drum_acces_teren');
				$table->integer('nr_fronturi_stradale');
				$table->string('nume',50); 
				$table->string('adresa', 200)->nullable();
				$table->string('teren', 200)->nullable();
				$table->string('telefon', 100)->nullable(); 
				$table->text('carte_funciara', 100);
				/*1. Clasificare teren - 1.1. Intravilan 1.2 Extravilan
				  2. Supratafa
				   - cu filtru - suprafata minima - suprafata maxima
				  3. Front stradal - cu filtru pe min - max
				  4. Pret vanzare (total)
				  5. Pret vanzare (metru patrat)
				  6. Constructie pe teren - Da/nu
				  7. Localitate
				  8. Localizare si imprejurimi = detalii referitoare la zona terenului
				  9. Cartier = daca e cazul
				  10. Sector - pt. Bucuresti
				  11. Utilitati
    11.1 Apa
    11.2 Canalizare
    11.3 Gaz
    11.4 Curent
				  12. Alte detalii zona
       - Amenajare strazi: asfaltate, pietruite
				  13. Pret negociabil - Da/Nu
				  14. Certificat de urbanism - Da/Nu
				  15. Adresa
				  16. Numar cadastral / Numar topografic
				  17. Categoria de folosinta
				  18. Numar parcela
				  19. Observatii/Referinte
				  20. Iluminat stradal
				  21. Drum de acces la teren - Da/Nu
				  22. Numar de fronturi stradale
				  23. CF = carte funciara*/
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('terenuri');
	}

}
