<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCladireAddCols extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cladiri', function(Blueprint $t){
			$t->integer('id_tip_categorie')->after('id_tip_stadiu')->unsigned()->nullable();
			$t->text('dotari');
			$t->double('cota_indiviza');
			$t->text('perioada_constructie', 50);
			$t->double('suprafata_utila');
			$t->integer('id_cartier')->after('id_localitate');
			$t->tinyinteger('climatizare');
			$t->tinyinteger('mansarda');
			$t->text('observatii'); 

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cladiri', function(Blueprint $t){
			if (Schema::hasColumn('cladiri' ,'id_tip_categorie'))
			{
			    $t->dropColumn('id_tip_categorie');  
			}
			if (Schema::hasColumn('cladiri' ,'dotari'))
			{
			    $t->dropColumn('dotari');  
			}
			if (Schema::hasColumn('cladiri' ,'cota_indiviza'))
			{
			    $t->dropColumn('cota_indiviza');  
			} 
			if (Schema::hasColumn('cladiri' ,'perioada_constructie'))
			{
			    $t->dropColumn('perioada_constructie');  
			}
			if (Schema::hasColumn('cladiri' ,'suprafata_utila'))
			{
			    $t->dropColumn('suprafata_utila');  
			}
			if (Schema::hasColumn('cladiri' ,'id_cartier'))
			{
			    $t->dropColumn('id_cartier');  
			}
			if (Schema::hasColumn('cladiri' ,'climatizare'))
			{
			    $t->dropColumn('climatizare');  
			}
			if (Schema::hasColumn('cladiri' ,'mansarda'))
			{
			    $t->dropColumn('mansarda');  
			}
			if (Schema::hasColumn('cladiri' ,'observatii'))
			{
			    $t->dropColumn('observatii');  
			}  
		});
	}

}
