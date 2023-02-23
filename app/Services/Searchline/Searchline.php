<?php

namespace App\Services\Searchline;

use Illuminate\Support\Facades\Log;

class Searchline
{
    private $api;
    
    public function __construct()
    {
        $this->api = new ApiCall;
    }

    public function isMobileBelongsToPerson($mobile,$nationalCode){

		// $mobile = array($mobile);
		// $idcode = array($nationalCode);
		$parametr = array(
		'Token'=>env("SEARCHLINE_TOKEN"),
		'Mobile'=>$mobile,
		'IdCode'=>$nationalCode,
		'op'=>'Shahkar');

		$handler = curl_init("https://inquery.ir/:70");
		curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($handler, CURLOPT_POSTFIELDS, $parametr);
		curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
       
		$response = curl_exec($handler);
     
		$result = json_decode($response, true);
        $httpcode = curl_getinfo($handler, CURLINFO_HTTP_CODE);
        
        return $result["Result"]["Validation"];
/* 
        $data = [
            "Mobile"=>array($mobile),
            "IdCode"=>array($nationalCode)
        ];
        $this->api->call($data, "Shahkar"); */
    }

}
