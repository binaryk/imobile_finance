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
        return [0 => ' -- Selectaţi dezvoltatorul --'] + self::orderBy('nume')->lists('nume', 'id');
    }
}