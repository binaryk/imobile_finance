<?php

namespace Imobiliare\Nomenclator;
 

class TipMobilare  
{ 
    public static function toCombobox()
    {  
        return ['' => ''] + [ 
            '1' => "Da",
            '2' => "Nemobilat",
            '3' => "Semimobilat",
            '4' => "Mobilat complet",
            '5' => "Mobilat și utilat",
            ]; 

    }
    
}