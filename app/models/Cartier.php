<?php

namespace Imobiliare;
use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Cartier extends \Eloquent 
{
    use SoftDeletingTrait;
    protected $fillable = ['nume'];
    protected $table    = 'cartiere';

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