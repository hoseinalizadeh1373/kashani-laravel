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

		$mobile = array($mobile);
		$idcode = array($nationalCode);
		$parametr = array(
		'token'=>env("SEARCHLINE_TOKEN"),
		'Mobile'=>json_encode($mobile),
		'IdCode'=>json_encode($idcode),
		'op'=>'Shahkar');
		$handler = curl_init("https://inquery.ir/:80");
		curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($handler, CURLOPT_POSTFIELDS, $parametr);
		curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($handler);
		$result = json_decode($response, true);
        $httpcode = curl_getinfo($handler, CURLINFO_HTTP_CODE);
        dump($httpcode,$result);

        echo $result["Result"][0]["Validation"] ?? "";

/* 
        $data = [
            "Mobile"=>array($mobile),
            "IdCode"=>array($nationalCode)
        ];
        $this->api->call($data, "Shahkar"); */
    }

}
