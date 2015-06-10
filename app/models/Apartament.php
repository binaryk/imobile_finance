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
	'id_tip_cladire',
	'id_tip_finisaje_interioare',
	'id_tip_compartiment',
	'is_agentie',
	'id_img',
	'oferta_valabila',
	'pret_m2',
	'ultima_actualizare',
	'suprafata_min',
	'suprafata_max',
	'email',
	'telefon',
	'telefon_secundar_1',
	'telefon_secundar_2',
	'nr_camere',
	'credit_prima_casa',
	'nr_etaj',
	'nr_balcoane',
	'anul_constructiei',
	'nr_bai',
	'detalii_bacoane',
	'id_sistem_incalzire',
	'are_termopane',
	'parcare',
	'accepta_prima_casa',
	'zona_aproximativa',
	'adresa_exacta',
	'detalii',
	'detalii_private',
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
    		$value = \Carbon\Carbon::now()->format('Y-m-d');

        $this->setDate('ultima_actualizare',$value);
    }
     

    public static function toCombobox()
    {
        return [0 => ' -- Selectaţi apartamentul --'] + self::orderBy('nume')->lists('nume', 'id');
    }
}