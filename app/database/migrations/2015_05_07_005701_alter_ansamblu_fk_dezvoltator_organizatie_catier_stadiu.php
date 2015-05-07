<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAnsambluFkDezvoltatorOrganizatieCatierStadiu extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ansambluri_rezidentiale',function( Blueprint $t ){
			
		$t
		->foreign('id_dezvoltator')
		->references('id')
		->on('dezvoltatori')
		->onDelete('restrict')
		->onUpdate('cascade');

		$t
		->foreign('id_organizatie')
		->references('id')
		->on('organizatii')
		->onDelete('restrict')
		->onUpdate('cascade');

		$t
		->foreign('id_cartier')
		->references('id')
		->on('cartiere')
		->onDelete('restrict')
		->onUpdate('cascade');

		$t
		->foreign('id_tip_stadiu_ansamblu')
		->references('id')
		->on('tip_stadii_ansamblu')
		->onDelete('restrict')
		->onUpdate('cascade');

	});

		/*id_dezvoltator
		id_organizatie
		id_cartier
		id_tip_stadiu_ansamblu*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ansambluri_rezidentiale', function( Blueprint $t){
			$t
			->dropForeign('ansambluri_rezidentiale_id_dezvoltator_foreign');	
			$t
			->dropForeign('ansambluri_rezidentiale_id_organizatie_foreign');	
			$t
			->dropForeign('ansambluri_rezidentiale_id_cartier_foreign');	
			$t
			->dropForeign('ansambluri_rezidentiale_id_tip_stadiu_ansamblu_foreign');	 
		});
	}

}
