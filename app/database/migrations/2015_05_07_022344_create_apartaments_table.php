<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApartamentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apartamente', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softdeletes();
			$table->integer('id_judet');
			$table->integer('id_localitate');
			$table->integer('id_cartier')->unsigned()->nullable();
			$table->integer('id_cladire')->unsigned()->nullable();
			$table->integer('id_imobil')->unsigned()->nullable();
			$table->integer('id_organizatie')->unsigned()->nullable();
			$table->integer('id_proprietar_pf')->unsigned()->nullable();
			$table->tinyinteger('id_tip_cladire');
			$table->tinyinteger('id_tip_finisaje_interioare');
			$table->tinyinteger('id_tip_compartiment');
			$table->tinyinteger('is_agentie');
			$table->tinyinteger('oferta_valabila');
			$table->double('pret_m2');
			$table->date('ultima_actualizare');
			$table->double('suprafata_min');
			$table->double('suprafata_max');
			$table->text('email',50);
			$table->text('telefon',50);
			$table->text('telefon_secundar_1',50);
			$table->text('telefon_secundar_2',50);
			$table->integer('nr_camere');
			$table->tinyinteger('credit_prima_casa');
			$table->tinyinteger('nr_etaj');
			$table->integer('nr_balcoane');
			$table->integer('anul_constructiei');
			$table->integer('nr_bai');
			$table->text('detalii_bacoane');
			$table->tinyinteger('id_sistem_incalzire');
			$table->tinyinteger('are_termopane');
			$table->text('parcare',50); 
			$table->text('zona_aproximativa');
			$table->text('adresa_exacta');
			$table->text('detalii');
			$table->text('detalii_private');





			$table
			->foreign('id_imobil')
			->references('id')
			->on('imobile')
			->onDelete('restrict')
			->onUpdate('cascade');

			$table
			->foreign('id_cartier')
			->references('id')
			->on('cartiere')
			->onDelete('restrict')
			->onUpdate('cascade');

			$table
			->foreign('id_organizatie')
			->references('id')
			->on('organizatii')
			->onDelete('restrict')
			->onUpdate('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('apartamente', function( Blueprint $t ){
			$t
			->dropForeign('apartamente_id_imobil_foreign');	
			$t
			->dropForeign('apartamente_id_cartier_foreign');
			$t
			->dropForeign('apartamente_id_organizatie_foreign');		
		});
		Schema::drop('apartamente');
	}

}
