<?php

namespace Imobiliare\Nomenclator;
 

class TipFinisajeExterioare  
{ 
    public static function toCombobox()
    {  
        return ['' => ''] + [ 
            '1' => "Cladire izolata termic",
            '2' => "Apartament izolat termic", 
        ];

    }
    
}