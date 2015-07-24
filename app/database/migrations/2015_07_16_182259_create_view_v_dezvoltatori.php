<?php

use Illuminate\Database\Migrations\Migration;

class CreateViewVDezvoltatori extends Migration {

	public function up() {
		DB::statement("DROP VIEW IF EXISTS `v_dezvoltatori`");
		DB::statement("
			CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`
			VIEW `v_dezvoltatori`
			AS
select
			dezvoltatori.id,
			dezvoltatori.id_organizatie,
			dezvoltatori.nume dezvoltator,
			ansambluri_rezidentiale.nume ansamblu,
			imobile.nume imobil,
			cladiri.nume cladire,
			apartamente.nume apartament,
			apartamente.nr_camere camere_apartament,
			apartamente.suprafata suprafata_utila,
			apartamente.id_tip_compartiment,
			tip_compartiment.nume as compartimentare_apartament,
			apartamente.id_tip_finisaje_interioare,
			tip_finisaje_interioare.nume as finisaje_interioare_apartament,
			apartamente.id_localitate,
			localitati.nume as localitate_apartament,
			apartamente.id_cartier,
			cartiere.nume as cartier_apartament,
			apartamente.strada adresa_apartament,
			apartamente.pret_m2,

			cladiri.data_finalizare data_finalizare_cladire,
			cladiri.id_tip_stadiu id_tip_stadiu_cladire,
			tip_stadii_ansamblu_cladire.nume stadiu_cladire,
			ansambluri_rezidentiale.id_tip_stadiu_ansamblu,
			tip_stadii_ansamblu.nume stadiu_ansamblu,
			ansambluri_rezidentiale.data_finalizare as data_finalizare_ansamblu,

			dezvoltatori.id_judet,
			dezvoltatori.adresa adresa_dezvoltator,
			dezvoltatori.telefon telefon_dezvoltator,
			judete.nume judet_dezvoltator,
			terenuri.nume as teren
			FROM
			dezvoltatori
			LEFT JOIN ansambluri_rezidentiale ON dezvoltatori.id = ansambluri_rezidentiale.id_dezvoltator
			LEFT JOIN imobile ON ansambluri_rezidentiale.id = imobile.id_ansamblu
			LEFT JOIN cladiri on imobile.id = cladiri.id_imobil
			LEFT JOIN apartamente on imobile.id = apartamente.id_imobil
			LEFT JOIN terenuri ON imobile.id = terenuri.id_imobil
			LEFT JOIN tip_compartiment ON apartamente.id_tip_compartiment = tip_compartiment.id
			LEFT JOIN tip_finisaje_interioare ON apartamente.id_tip_finisaje_interioare = tip_finisaje_interioare.id
			LEFT JOIN localitati ON apartamente.id_localitate = localitati.id
			LEFT JOIN cartiere ON apartamente.id_cartier = cartiere.id
			LEFT JOIN tip_stadii_ansamblu ON ansambluri_rezidentiale.id_tip_stadiu_ansamblu= tip_stadii_ansamblu.id
			LEFT JOIN tip_stadii_ansamblu AS tip_stadii_ansamblu_cladire ON cladiri.id_tip_stadiu = tip_stadii_ansamblu_cladire.id
			LEFT JOIN judete ON dezvoltatori.id_judet = judete.id

		where dezvoltatori.deleted_at is null
		");
	}

	public function down() {
		DB::statement("DROP VIEW IF EXISTS `v_dezvoltatori`");
	}

}
