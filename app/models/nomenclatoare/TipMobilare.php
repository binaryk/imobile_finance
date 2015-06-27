<?php

namespace Imobiliare\Nomenclator;
 

class TipMobilare  
{ 
    public static function toCombobox()
    {  
        return ['' => ''] + [ 
            '0' => "Nemobilat",
            '1' => "Semimobilat",
            '2' => "Mobilat complet",
            '3' => "Mobilat și utilat",
            ]; 

    }
    
}