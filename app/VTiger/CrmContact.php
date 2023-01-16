<?php 

namespace App\VTiger;

use App\Services\Searchline\Searchline;

class CrmContact{
    
    private $rawContact;
    
    public function __construct($rawContact){
        $this->rawContact = (array) $rawContact;
    }

    private function map($field){

        $crmRawFields = [
            "national_code" => "cf_pcf_irc_1122",
            "type" => "cf_931",
            "bjalali" => function(){
                return convertDateTOJalali($this->birthdate);
            },
        ];

        
        if(isset($crmRawFields[$field]) and is_callable($crmRawFields[$field])){
            return $crmRawFields[$field]();
        }
        
        return $this->rawContact[$crmRawFields[$field] ?? $field] ?? null;
    }

    public function __get($field){
        return $this->map($field);
    }

    public function checkMobileBelongsTo(){
        $searchline = new Searchline;
        return $searchline->isMobileBelongsToPerson($this->mobile,$this->national_code);
    }

    public function getRaw(){
        return $this->rawContact;
    }
}