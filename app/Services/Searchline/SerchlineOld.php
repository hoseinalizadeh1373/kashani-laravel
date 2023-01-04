<?php 

namespace App\Services\ContactVerification;


class Serchline{

    public function isMobileBelongsToPerson($mobile,$national_code){
        return true;
    }


    public function call($parameters){

        $client = new Client;
        header('Content-Type: text/html; charset=utf-8');
		$mobile = array('09123456789,09355555555');
		$idcode = array('0000000000,1111111111');
		$parametr = array(
		'token'=>'',
		'Mobile'=>json_encode($mobile),
		'IdCode'=>json_encode($idcode),
		'op'=>'Shahkar');
		$handler = curl_init("https://inquery.ir/:80");
		curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($handler, CURLOPT_POSTFIELDS, $parametr);
		curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($handler);
		$result = json_decode($response, true);
        echo $result[Result][0][Validation];
        echo $result[Result][1][Validation];
    }
}