<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFkProprietarImbobilPf extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('apartamente', function(Blueprint $t){
			/*$t
			->foreign('id_proprietar_pf')
			->references('id')
			->on('proprietari_persoane_fizice')
			->onDelete('restrict')
			->onUpdate('cascade');*/
		});
	} 

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('apartamente', function (Blueprint $t) {
			// $t->dropForeign('apartamente_id_proprietar_pf_foreign');
        }); 
	}

}
