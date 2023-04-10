<?php

namespace App\Services\VTiger;

use App\Services\Searchline\Searchline;
use Hekmatinasser\Verta\Verta;

class CrmContact
{
    private $rawContact;


    public function __construct($rawContact)
    {
        $this->rawContact = (array) $rawContact;
    }

    private function map($field)
    {

        $crmRawFields = [
            "national_code" => "cf_pcf_irc_1122",
            "type" => "cf_931",
            "bjalali" => function () {
                return Verta($this->birthday)->format("Y-n-j");
            },
        ];

        if(isset($crmRawFields[$field]) and is_callable($crmRawFields[$field])) {
            return $crmRawFields[$field]();
        }

        return $this->rawContact[$crmRawFields[$field] ?? $field] ?? null;
    }

    public function __get($field)
    {
        return $this->map($field);
    }

    public function getRaw()
    {
        return $this->rawContact;
    }

}
