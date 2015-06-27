<?php

namespace Imobiliare\Nomenclator;
 

class NumarCamere  
{ 
    public static function toCombobox()
    {  
        return ['' => ''] + [ 
        '1' => "o cameră",
        '2' => "2 camere",
        '3' => "3 camere",
        '4' => "4 camere",
        '5' => "5 camere",
        '6' => "6 camere",
        ];

    }
    
}