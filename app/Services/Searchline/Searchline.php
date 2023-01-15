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

        return true;
        header('Content-Type: text/html; charset=utf-8');
		$mobile = array("09332999173");
		$idcode = array("0890345775");
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
        dd($httpcode,$result);

        echo $result["Result"][0]["Validation"];
        echo $result["Result"][1]["Validation"];








        $data = [
            "Mobile"=>array($mobile),
            "IdCode"=>array($nationalCode)
        ];
        $this->api->call($data, "Shahkar");
    }

}
