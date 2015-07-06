<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterApartamenteRenameCols extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('apartamente', function($table)
		{ 
		    $table->dropColumn('detalii_suplimentare');
		    $table->dropColumn('detalii_suplimentare_2');
		});
		Schema::table('apartamente', function(Blueprint $table){
			$table->text('observatii_caracteristici_generale');//observatii caracteristici apartament in app veche
			$table->text('observatii_finisaje_dotari');//observatii finisaje si dotari in app veche
			$table->text('observatii_dotari');///Observatii dotari in app veche
			$table->text('observatii_generale');//observatii generale in app veche
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
