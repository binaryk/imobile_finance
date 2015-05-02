<?php

class TipFinisajeExterne extends \Eloquent {
	protected $fillable = ['denumire'];
	protected $table    = 'tip_finisaje_externe';

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