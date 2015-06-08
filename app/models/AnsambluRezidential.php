<?php

namespace Imobiliare;

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class AnsambluRezidential extends \Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'ansambluri_rezidentiale';
    protected $fillable = [
        'id_dezvoltator',
        'id_organizatie',
        'id_cartier',
        'id_tip_stadiu_ansamblu',
        'telefon',
        'nume',
        'anul_infiintarii',
        'data_estimativa_vanzare',
        'strada',
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
        return [0 => ' -- Selectaţi ansamblul --'] + self::orderBy('nume')->lists('nume', 'id');
    }
}