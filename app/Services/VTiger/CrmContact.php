<?php

namespace App\Services\VTiger;

use App\Models\User;
use App\Services\Searchline\Searchline;
use Hekmatinasser\Verta\Verta;

class CrmContact
{
    private $rawContact;

    private $hidden = [
        "wcontactid","support_start_date","support_end_date","starred","source","secondaryemail","salutationtype",
        "reference","portal","leadsource","isconvertedfromlead","imagename","id","contact_no","contact_id",
        "cf_servicecontracts_id","assistantphone","assigned_user_id","account_id","createdtime","modifiedtime",
        "source","ltv_ltv","ltv_lpd","ltv_orderscount","donotcall","modifiedby"
    ];

    private $visible = [
        "firstname","lastname","cf_1036","mobile","otherphone","birthday","cf_1042","cf_pcf_irc_1122",
        "cf_1038","cf_pcf_ccn_1127","cf_1058","cf_1062","cf_1064","cf_1225",
        "cf_1221","cf_1030","cf_1205","cf_1193","cf_1247","cf_1048","cf_1529",
        "cf_1050","cf_1052","cf_1195","cf_1197","cf_1255","cf_1480","cf_1809","cf_1515",
        "cf_1249","cf_1251","cf_1253","cf_1880","cf_1882",
        "mailingstreet","cf_pcf_irp_1076","cf_1521",
    ];

    public function __construct($rawContact)
    {
        $this->rawContact = $this->rawFilter((array) $rawContact);
    }

    private function rawFilter($array)
    {
        $toArray = ["cf_1193","cf_1529","cf_1195","cf_1197","cf_1809","cf_1515","cf_1521"];
        $filtered  = [];
        foreach($array as $key=>$value) {
            $filtered[$key] = in_array($key, $toArray) ? explode(" |##| ", $value) : $value;
        }

        return $filtered;
    }

    private function map($field)
    {

        $crmRawFields = [
            "national_code" => "cf_pcf_irc_1122",


            "type" => function () {
                return [
                    "مراقب"=>User::CONTACT_TYPE_MORAGHEB,
                    "پرستار"=>User::CONTACT_TYPE_PARASTAR,
                    "دکتر"=>User::CONTACT_TYPE_DOCTOR,
                    "پزشک متخصص"=>User::CONTACT_TYPE_DOCTOR,
                ][$this->cf_931] ?? null;
            },

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
        return array_intersect_key($this->rawContact, array_flip($this->visible));
    }

}
