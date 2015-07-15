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
	'id_tip_finisaje_externe',
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
	'negociabil',
    'strada',
    'nr_cladire',
    'scara',
    'nr_apartament',
    'suprafata_teren',
    'tip_imobil',
    'vechime_imobil',
    'id_tip_mobilare',
    // noi
    'extras_cf',
    'has_balcon',
    'has_electrocasnice',
    'has_terasa',
    'has_dotari',
    'id_dezvoltator',
    'nr_etaje_cladire', 
    'data_aparitiei',
    'observatii_caracteristici_generale',
    'observatii_finisaje_dotari',
    'observatii_dotari',
    'observatii_generale ',
//   dupa discutai din 14.07.2015
    'id_tip_utilitati_existente',
    'front_strada_principala',
    'existenta_drum_de_servitute',
    'existenta_constructie_pe_teren',
    'id_tip_teren',
    'existenta_pud_teren',
    'existenta_puz_teren',
    'regim_inaltime_teren',

    // id_tip_finisaje_externe --- sus
	];
    protected $guarded = [];     
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

    /**
     * Accesors
     **/
    public function getNumejudetAttribute()
    {
    	return $this->judet ? $this->judet->nume : NULL;
    }

    public function getNumelocalitateAttribute()
    {
    	return $this->localitate ? $this->localitate->nume : NULL;
    }

    public function getNumecartierAttribute()
    {
    	return $this->cartier ? $this->cartier->nume : NULL;
    }

    public function getNumetipetajAttribute()
    {
    	return $this->tipetaj ? $this->tipetaj->nume : NULL;
    }

    public function getNumetipbalconAttribute()
    {
    	return $this->tipbalcon ? $this->tipbalcon->nume : NULL;
    }

    public function getNumetipfinisareAttribute()
    {
    	return $this->tipfinisare ? $this->tipfinisare->nume : NULL;
    }
    public function getNumetipfinisareexterioareAttribute()
    {
    	return $this->tipfinisareexterioare ? $this->tipfinisareexterioare->nume : NULL;
    }

    public function getNumetipgarajAttribute()
    {
    	return $this->tipgaraj ? $this->tipgaraj->nume : NULL;
    }

    public function getNumetipcompartimentareAttribute()
    {
    	return $this->tipcompartimentare ? $this->tipcompartimentare->nume : NULL;
    }

    public function getNumeproprietarAttribute()
    {
        return $this->proprietar ? $this->proprietar->nume : NULL;
    }

    public function getTelefonproprietarAttribute()
    {
        return $this->proprietar ? $this->proprietar->telefon : NULL;
    }

    public function getNumetipcladireAttribute()
    {
        return $this->tipcladire ? $this->tipcladire->nume : NULL;
    }

    public function getNumetipacoperisAttribute()
    {
        return $this->tipacoperis ? $this->tipacoperis->nume : NULL;
    }

    public function getNumetipconfortAttribute()
    {
        return $this->tipconfort ? $this->tipconfort->nume : NULL;
    }

    /**
     * Relations
     **/
    public function Judet()
    {
        return $this->belongsTo('\Imobiliare\Nomenclator\Judet', 'id_judet');
    }

	public function Localitate()
    {
        return $this->belongsTo('\Imobiliare\Nomenclator\Localitate', 'id_localitate');
    }

    public function Cartier()
    {
        return $this->belongsTo('\Imobiliare\Cartier', 'id_cartier');
    }

    public function Tipetaj()
    {
        return $this->belongsTo('Imobiliare\Nomenclator\TipEtaj', 'nr_etaj');
    }

    public function Tipbalcon()
    {
        return $this->belongsTo('\Imobiliare\Nomenclator\TipNrBalcoane', 'nr_balcoane');
    }

    public function Tipfinisare()
    {
        return $this->belongsTo('\Imobiliare\Nomenclator\TipFinisajeInterioare', 'id_tip_finisaje_interioare');
    }
    public function Tipfinisareexterioare()
    {
        return $this->belongsTo('\Imobiliare\Nomenclator\TipFinisajeExterioare', 'id_tip_finisaje_externe');
    }

    public function Tipgaraj()
    {
        return $this->belongsTo('\Imobiliare\Nomenclator\TipGaraj', 'id_tip_garaj');
    }

    public function Tipcompartimentare()
    {
        return $this->belongsTo('\Imobiliare\Nomenclator\TipCompartiment', 'id_tip_compartiment');
    }

    public function Proprietar()
    {
        return $this->belongsTo('\Imobiliare\Proprietar', 'id_proprietar_pf');
    }

    public function Tipcladire()
    {
        return $this->belongsTo('\Imobiliare\Nomenclator\TipCategorieCladire', 'id_tip_cladire');
    }

    public function Tipacoperis()
    {
        return $this->belongsTo('\Imobiliare\Nomenclator\TipAcoperis', 'tip_acoperis');
    }

    public function Tipconfort()
    {
        return $this->belongsTo('\Imobiliare\Nomenclator\TipConfort', 'tip_confort');
    }
}