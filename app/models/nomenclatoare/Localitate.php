<?php

namespace Imobiliare\Nomenclator;

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Localitate extends \Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'localitati';
    protected $fillable = ['nume', 'id_judet'];

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

    public static function toCombobox( $noneCaption = '')
    {
        //        pentru pluginul select2 am nevoie ca primul record sa fie ''=>''
        return ['' => $noneCaption] + self::orderBy('nume')->lists('nume', 'id');
    }
}