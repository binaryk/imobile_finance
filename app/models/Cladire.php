<?php

namespace Imobiliare;

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Cladire extends \Eloquent {
	use SoftDeletingTrait;
	protected $table = 'cladiri';
	protected $fillable = [
		'id_imobil',
		'id_localitate',
		'id_tip_destinatie',
		'id_tip_regim_inaltime',
		'id_tip_stadiu',
		'nr_spatii_indivize',
		'nume',
		'ascensor',
		'adresa',
		'telefon',
		'email',
		'carte_funciara',
		'id_tip_categorie',
		'dotari',
		'cota_indiviza',
		'perioada_constructie',
		'suprafata_utila',
		'id_cartier',
		'climatizare',
		'mansarda',
		'observatii',
		'data_finalizare',
		'regim_inaltime',

	];
	public function getDate($camp) {
		return date("d.m.Y", strtotime($this->attributes[$camp]));
	}

	public function setDate($camp, $value) {
		$this->attributes[$camp] = date("Y-m-d", strtotime($value));
	}
	public function getDataFinalizareAttribute() {
		return $this->getDate('data_finalizare');
	}

	public function setDataFinalizareAttribute($value) {
		if ($value == '') {
			$value = \Carbon\Carbon::now()->format('Y-m-d');
		}

		$this->setDate('data_finalizare', $value);
	}

	public static function getRecord($id) {
		return self::find($id);
	}

	public static function createRecord($data) {
		return self::create($data);
	}

	public static function updateRecord($id, $data) {
		$record = self::find($id);
		if (!$record) {
			return false;
		}
		return $record->update($data);
	}

	public static function deleteRecord($id, $data) {
		$record = self::find($id);
		if (!$record) {
			return false;
		}
		return $record->delete();
	}

	public static function toCombobox() {
		return [0 => ' -- Selectaţi cladire --'] + self::orderBy('nume')->lists('nume', 'id');
	}

	public function Apartamente()
	{
		return $this->hasMany('\Imobiliare\Apartament','id_cladire');
	}

	public function Localitate()
	{
		return $this->belongsTo('\Imobiliare\Nomenclator\Localitate', 'id_localitate');
	}

	public function getNumelocalitateAttribute()
	{
		return $this->localitate ? $this->localitate->nume : NULL;
	}

	public function Cartier()
	{
		return $this->belongsTo('\Imobiliare\Cartier', 'id_cartier');
	}

	public function getNumecartierAttribute()
	{
		return $this->cartier ? $this->cartier->nume : NULL;
	}
	public function Inaltime()
	{
		return $this->belongsTo('\Imobiliare\Nomenclator\TipRegimInaltime', 'id_tip_regim_inaltime');
	}

	public function getNumeregiminaltimeAttribute()
	{
		return $this->inaltime ? $this->inaltime->nume : NULL;
	}
	public function Stadiu()
	{
		return $this->belongsTo('\Imobiliare\Nomenclator\TipStadiuAnsamblu', 'id_tip_stadiu');
	}

	public function getNumetipstadiuAttribute()
	{
		return $this->stadiu ? $this->stadiu->nume : NULL;
	}
	public function Categorie()
	{
		return $this->belongsTo('\Imobiliare\Nomenclator\TipCategorieCladire', 'id_tip_categorie');
	}

	public function getNumetipcategorieAttribute()
	{
		return $this->categorie ? $this->categorie->nume : NULL;
	}
	public function Destinatie()
	{
		return $this->belongsTo('\Imobiliare\Nomenclator\TipDestinatieCladire', 'id_tip_destinatie');
	}

	public function getNumetipdestinatieAttribute()
	{
		return $this->destinatie ? $this->destinatie->nume : NULL;
	}
}