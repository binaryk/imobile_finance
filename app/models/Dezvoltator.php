<?php

namespace Imobiliare;

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Dezvoltator extends \Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'dezvoltatori';
    protected $fillable = [
		'id_judet',
		'nume',
		'prenume',
		'adresa',
		'telefon',
		'email',
        'id_organizatie'
    ];

    public static function getRecord( $id )
    {
        return self::find($id);
    }

    public static function createRecord($data )
    {
        $data['id_organizatie'] = $data['id_organizatie'];  
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

    public static function toCombobox()
    {
        return [0 => ' -- Selectaţi dezvoltatorul --'] + self::orderBy('nume')->lists('nume', 'id');
    }

    public function Cartier()
    {
        return $this->belongsTo('\Imobiliare\Cartier', 'id_cartier');
    }

    public function getNumecartierAttribute()
    {
        return $this->cartier ? $this->cartier->nume : NULL;
    }

    public function Judet()
    {
        return $this->belongsTo('\Imobiliare\Nomenclator\Judet', 'id_judet');
    }

    public function getNumejudetAttribute()
    {
        return $this->judet ? $this->judet->nume : NULL;
    }

    public function Ansambluri(){
        return $this->hasMany('\Imobiliare\AnsambluRezidential','id_dezvoltator');
    }

    public function getNumeansambluAttribute(){
        $ansambluri = $this->ansambluri->toArray();
        $nume = [];
        foreach($ansambluri as $ansamblu){
            if($ansamblu['nume']){
                $nume[] = $ansamblu['nume'];
            }
        }
        return $nume;// $this->ansamblu ? $this->ansamblu->toArray() : NULL;
    }






}