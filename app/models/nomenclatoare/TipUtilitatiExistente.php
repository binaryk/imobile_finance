<?php
/**
 * Created by PhpStorm.
 * User: lupac
 * Date: 7/14/2015
 * Time: 3:50 PM
 */

namespace Imobiliare\Nomenclator;


class TipUtilitatiExistente
{
    public static function toCombobox()
    {
        return ['' => ''] + [
            '1' => "In apropierea terenului",
            '2' => "Nu sunt utilitati in apropierea terenului"
        ];

    }

}