<?php
namespace Imobiliare\Nomenclator;

class TipEtaj extends \Eloquent {
	protected $fillable = ['nume'];
	protected $table    = 'tip_etaje';

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
        return ['' => ''] + self::orderBy('id')->lists('nume', 'id');
    }
}