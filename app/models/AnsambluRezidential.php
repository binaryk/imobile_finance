<?php

namespace Imobiliare;

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class AnsambluRezidential extends \Eloquent {
	use SoftDeletingTrait;
	protected $table = 'ansambluri_rezidentiale';
	protected $fillable = [
		'id_dezvoltator',
		'id_organizatie',
		'id_cartier',
		'id_tip_stadiu_ansamblu',
		'telefon',
		'nume',
		'anul_infiintarii',
		'data_estimativa_vanzare',
		'strada',
		'detalii_localizare_descriere',
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
		return [0 => ' -- Selectaţi ansamblul --'] + self::orderBy('nume')->lists('nume', 'id');
	}

	public function Imobile(){
		return $this->hasMany('\Imobiliare\Imobil', 'id_ansamblu');
	}

	public function Stadiu()
	{
		return $this->belongsTo('\Imobiliare\Nomenclator\TipStadiuAnsamblu','id_tip_stadiu_ansamblu');
	}

	public function getNumestadiuAttribute()
	{
		return $this->id_tip_stadiu_ansamblu ? $this->stadiu->nume : NULL;
	}

	public function Cladiri()
	{
		return $this->hasMany('\Imobiliare\Imobil', 'id_ansamblu')->where('id_tip_categorie','1');
	}
	public function Terenuri()
	{
		return $this->hasMany('\Imobiliare\Imobil', 'id_ansamblu')->where('id_tip_categorie','3');
	}

}