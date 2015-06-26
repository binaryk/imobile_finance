<?php

namespace Imobiliare;

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Agentie extends \Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'agentii';
    protected $fillable = ['nume', 'telefon'];

    public static function getRecord($id)
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
        return [0 => ' -- Selectaţi agenţia --'] + self::orderBy('nume')->lists('nume', 'id');
    }   
     
}