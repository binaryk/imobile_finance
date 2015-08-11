<?php

namespace Imobiliare;

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Imobil extends \Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'imobile';
    protected $fillable = [ 
        'nume',
        'id_ansamblu',
        'id_tip_categorie',
        'id_tip_imobil',
        'suprafata_min',
        'suprafata_max',

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

    public static function toCombobox()
    {
        return [0 => ' -- Selectaţi imobil --'] + self::orderBy('nume')->lists('nume', 'id');
    }

    public function Cladiri(){
        return $this->hasMany('\Imobiliare\Cladire','id_imobil');
    }

    public function Apartamente()
    {
        return $this->hasMany('\Imobiliare\Apartament','id_imobil');
    }

    public function Terenuri()
    {
        return $this->hasMany('\Imobiliare\Teren','id_imobil');
    }

}