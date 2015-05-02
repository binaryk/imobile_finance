<?php

class Imobile extends \Eloquent {
	protected $fillable = [
      'judet_id',
      'localitate_id',
      'cartier_id',
      'nr_camere',
      'strada_cladire',
      'nr_cladire',
      'tip_cladire',
      'nr_apartament',
      'nr_etaje_cladire',
      'pret_vanzare_euro',
      'pret_negociabil',
      'data_aparitie_anunt',
      'data_ultimei_actualizari',
      'valabilitate_oferta',
      'nume_vanzator',
      'telefon_1',
      'telefon_2',
      'extras_cf',
      'observatii_generale',
      'credit_prima_casa',
      'etaj_apartament',
      'compartiment_apartament',
      'suprafata_apartamnet',
      'observatii_apartament',
      'finisaje_exterioare',
      'finisaje_interioare',
      'gresie_noua',
      'faianta_noua',
      'parchet_nou',
      'zugravit_recent',
      'dotari',
      'usa_metalica',
      'centrala_termica',
      'ferestre_termopan',
      'electrocasnice',
      'mobilare',
      'observatii_finisaje_dotari',
      'loc_parcare',
      'beci',
      'terasa',
      'existenta_balcon',
      'observatii_dotari',
    ];
	protected $table    = 'imobile';

  public function localitate()
  {
    return $this->belongsTo('Localitati', 'localitate_id');
  }

  public function judet()
  {
    return $this->belongsTo('Judet', 'judet_id');
  }

  public function cartier()
  {
    return $this->belongsTo('Cartier', 'cartier_id');
  }

  public function nrcam()
  {
    return $this->belongsTo('TipNrCamere', 'nr_camere');
  }


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

    public static function deleteRecord($id)
    {
        $record = self::find($id);
        if( ! $record )
        {
            return false;
        }
        return $record->delete();
    }	
}