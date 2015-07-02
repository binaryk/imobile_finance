<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableApartamenteAddCols2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('apartamente', function($table)
		{
	    	$table->tinyinteger('extras_cf');
	    	$table->tinyinteger('has_balcon');
	    	$table->tinyinteger('has_electrocasnice');
	    	$table->tinyinteger('has_terasa');
	    	$table->tinyinteger('has_dotari');
	    	$table->integer('id_dezvoltator')->nullable();
	    	$table->integer('id_tip_finisaje_externe')->nullable();
	    	$table->text('nr_etaje_cladire', 15)->nullable();
	    	$table->date('data_aparitiei', 15)->nullable();
	    	$table->text('detalii_suplimentare');
	    	$table->text('detalii_suplimentare_2');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('apartamente', function($table)
		{
		    $table->dropColumn('extras_cf');
		    $table->dropColumn('has_balcon');
		    $table->dropColumn('has_electrocasnice');
		    $table->dropColumn('has_terasa');
		    $table->dropColumn('has_dotari');
		    $table->dropColumn('id_dezvoltator');
		    $table->dropColumn('id_tip_finisaje_externe');
		    $table->dropColumn('nr_etaje_cladire');
		    $table->dropColumn('data_aparitiei');
		});
	}

}
