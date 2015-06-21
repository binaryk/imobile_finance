<?php

namespace Imobiliare;

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Proprietar extends \Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'proprietari_persoane_fizice';
    protected $fillable = [
		'nume',
		'telefon',
        'id_organizatie'
    ];

    public static function getRecord( $id )
    {
        return self::find($id);
    }

    public static function createRecord($data )
    {
        $data['id_organizatie'] = $data['id_organizatie'];  
        if( $data['nume'] == ''){
            $data['nume'] = 'Nume proprietar';
        }
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
        return [0 => ' -- Selectaţi proprietarul --'] + self::orderBy('nume')->lists('nume', 'id');
    }   
     
}