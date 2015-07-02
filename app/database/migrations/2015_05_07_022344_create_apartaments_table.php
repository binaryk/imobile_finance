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
			$table->integer('id_tip_garaj')->unsigned()->nullable();
			$table->tinyinteger('id_tip_cladire');
			$table->tinyinteger('id_tip_finisaje_interioare');
			$table->tinyinteger('id_tip_compartiment');
			$table->tinyinteger('id_tip_mobilare');
			$table->tinyinteger('is_agentie')->default(0);
			$table->tinyinteger('oferta_valabila')->default(0);
			$table->tinyinteger('termopan');
			$table->tinyinteger('contoare_gaz');
			$table->tinyinteger('parchet');
			$table->tinyinteger('faianta');
			$table->tinyinteger('aer_conditionat');
			$table->tinyinteger('uscator');
			$table->tinyinteger('centrala_termica');
			$table->tinyinteger('contoare_apa');
			$table->tinyinteger('zugravit_lavabil');
			$table->tinyinteger('tv_cablu');
			$table->tinyinteger('loc_pod');
			$table->tinyinteger('usa_atiefractie');
			$table->tinyinteger('modificari_interioare');
			$table->tinyinteger('gresie');
			$table->tinyinteger('balcoane_inchise');
			$table->tinyinteger('has_telefon');
			$table->tinyinteger('loc_pivnita');
			$table->tinyinteger('parcare'); 
			$table->tinyinteger('negociabil'); 
			$table->integer('nr_etaj');
			$table->integer('nr_balcoane');
			$table->integer('tip_acoperis');
			$table->integer('tip_confort');

			$table->double('pret_m2');
			$table->date('ultima_actualizare');
			$table->double('suprafata');
			$table->double('suprafata_min');
			$table->double('suprafata_max');
			$table->text('email',50);
			$table->text('nume',50);
			$table->text('telefon',50);
			$table->text('telefon_secundar_1',50);
			$table->text('telefon_secundar_2',50);
			$table->integer('nr_camere');
			$table->tinyinteger('credit_prima_casa');
			$table->text('anul_constructiei', 50);
			$table->integer('nr_bai');
			$table->text('detalii_bacoane');
			$table->tinyinteger('id_sistem_incalzire'); 
			$table->text('zona_aproximativa');
			$table->text('adresa_exacta');
			$table->text('detalii');
			$table->text('detalii_private');


			$table
			->foreign('id_imobil')
			->references('id')
			->on('imobile')
			->onDelete('restrict')
			->onUpdate('cascade');/*

			$table
			->foreign('id_cartier')
			->references('id')
			->on('cartiere')
			->onDelete('restrict')
			->onUpdate('cascade');*/

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
			/*$t
			->dropForeign('apartamente_id_cartier_foreign');*/
			$t
			->dropForeign('apartamente_id_organizatie_foreign');		
		});
		Schema::drop('apartamente');
	}

}
