<?php
/**
 * Created by PhpStorm.
 * User: lupac
 * Date: 7/14/2015
 * Time: 3:56 PM
 */

namespace Imobiliare\Nomenclator;


class TipTeren
{
    public static function toCombobox()
    {
        return ['' => ''] + [
            '1' => "Intravilan",
            '2' => "Extravilan"
        ];

    }

}