<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewLocalitati extends Migration {

    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS `v_localitati`");
        DB::statement("
			CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`
			VIEW `v_localitati`
			AS
			SELECT
				localitati.id,
				localitati.nume as localitate,
				judete.nume as judet,
				judete.id as id_judet
			FROM localitati
			LEFT JOIN judete
			ON localitati.id_judet = judete.id
			ORDER BY localitati.id
		");
    }

    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `v_localitati`");
    }

}

