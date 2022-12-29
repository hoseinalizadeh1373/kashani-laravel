<?php

namespace App\Services\Searchline;

class Searchline
{
    private $api;
    
    public function __construct()
    {
        $this->api = new ApiCall;
    }

    public function isMobileBelongsToPerson($mobile,$nationalCode){
        $data = [
            "Mobile"=>array($mobile),
            "IdCode"=>array($nationalCode)
        ];
        $this->api->call($data, "Shahkar");
    }

}
