<?php
namespace Imobiliare;
use \Illuminate\Database\Eloquent\SoftDeletingTrait;
class Apartament extends \Eloquent {
	use SoftDeletingTrait;
	protected $table = 'apartamente';
	protected $fillable = [
	'id_judet',
	'id_localitate',
	'id_cartier',
	'id_cladire',
	'id_imobil',
	'id_organizatie',
	'id_proprietar_pf',
	'id_tip_garaj',
	'id_tip_cladire',
	'id_tip_finisaje_interioare',
	'id_tip_compartiment',
	'is_agentie',
	'oferta_valabila',
	'termopan',
	'contoare_gaz',
	'parchet',	
	'faianta',
	'aer_conditionat',
	'uscator',
	'centrala_termica',
	'contoare_apa',
	'zugravit_lavabil',
	'tv_cablu',
	'loc_pod',
	'usa_atiefractie',
	'modificari_interioare',
	'gresie',
	'balcoane_inchise',
	'has_telefon',
	'loc_pivnita',
	'parcare',
	'nr_etaj',
	'nr_balcoane',
	'tip_acoperis',
	'tip_confort',
	'pret_m2',
	'ultima_actualizare',
	'email',
	'nume',
	'telefon',
	'telefon_secundar_1',
	'telefon_secundar_2',
	'suprafata',
	'suprafata_min',
	'suprafata_max',
	'nr_camere',
	'credit_prima_casa',
	'anul_constructiei',
	'nr_bai',
	'detalii_bacoane',
	'id_sistem_incalzire',
	'zona_aproximativa',
	'adresa_exacta',
	'detalii',
	'detalii_private',
	'negociabil'
	];

	public static function getRecord( $id )
    {
        return self::find($id);
    }

    public static function createRecord($data )
    {
        return self::create($data);
    }

    public static function updateRecord($id, $data)
    {
        $record = self::find($id);
        if( ! $record )
        {
            return false;
        }
        return $record->update($data);
    }

    public static function deleteRecord($id, $data)
    {
        $record = self::find($id);
        if( ! $record )
        {
            return false;
        }
        return $record->delete();
    }

	public function getDate($camp)
	{
	    return date("d.m.Y",strtotime($this->attributes[$camp]));
	}

	public function setDate($camp,$value)   
	{
	    $this->attributes[$camp] = date("Y-m-d",strtotime($value));
	}

	public function getUltimaActualizareAttribute()
    { 
        return $this->getDate('ultima_actualizare');
    }

    public function setUltimaActualizareAttribute($value)
    {
    	if( $value == '' )
    		$value =  \Carbon\Carbon::now()->format('Y-m-d');

        $this->setDate('ultima_actualizare',$value);
    }
     

    public static function toCombobox()
    {
        return [0 => ' -- Selectaţi apartamentul --'] + self::orderBy('nume')->lists('nume', 'id');
    }
}