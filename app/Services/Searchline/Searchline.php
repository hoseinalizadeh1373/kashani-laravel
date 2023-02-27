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


    /**
     * Undocumented function
     *
     * @param [type] $mobile
     * @param [type] $nationalCode
     * @return boolean|null if api not responde return null.
     */
    public function isMobileBelongsToPerson($mobile,$nationalCode){
       
        $parameters = array(
            'Token'=>env("SEARCHLINE_TOKEN"),
            'Mobile'=>$mobile,
            'IdCode'=>$nationalCode,
            'op'=>'Shahkar'
        );

        try{
            return $this->connect($parameters);
        }
        catch(\Exception $exeption){
            Log::critical("Searchline Error:" . $exeption->getMessage());
            return null;
        }

    }

    private function connect($parameters){

        $handler = curl_init("https://inquery.ir/:70");
		curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($handler, CURLOPT_POSTFIELDS, $parameters);
		curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handler,CURLOPT_TIMEOUT,10);
       
		$response = curl_exec($handler);
     
		$result = json_decode($response, true);
        $httpcode = curl_getinfo($handler, CURLINFO_HTTP_CODE);
        
        return $result["Result"]["Validation"];

    }

}
