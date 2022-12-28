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
            "mobile"=>$mobile,
            "id"=>$nationalCode
        ];
        $this->api->call($data, "Shahkar");
    }

}
