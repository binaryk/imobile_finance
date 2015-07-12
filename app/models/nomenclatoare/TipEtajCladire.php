<?php
/**
 * Created by PhpStorm.
 * User: lupac
 * Date: 7/12/2015
 * Time: 1:09 PM
 */

namespace Imobiliare\Nomenclator;

class TipEtajCladire
{
    public static function toCombobox()
    {
        return ['' => ''] + [
            '1' => "1",
            '2' => "2",
            '3' => "3",
            '4' => "4",
            '5' => "5",
            '6' => "6",
            '7' => "7",
            '8' => "8",
            '9' => "9",
            '10' => "10",
            '11' => "11",
            '12' => "12",
        ];

    }
}