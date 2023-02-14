<?php 

namespace App\VTiger;

use App\Services\Searchline\Searchline;
use Hekmatinasser\Verta\Verta;

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
                return Verta($this->birthday)->format("Y-n-j");
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
        return false;    
        // $client = new \GuzzleHttp\Client();
        // $res = $client->post(
        //     'https://inquery.ir:70',
        //     array(
        //         'form_params' =>array(
        //             'token'=>env("SEARCHLINE_TOKEN"),
        //             'Mobile'=>json_encode('09332999173'),
        //             'IdCode'=>json_encode('0899045775'),
        //             'op'=>'Shahkar'
        //                              )
        //          )
        // );

        // $mobile = '09332999173';
        // $idcode = '0890345775';
        // $params = array(
        //     'token'=>env("SEARCHLINE_TOKEN"),
        //     'Mobile'=>json_encode($mobile),
        //     'IdCode'=>json_encode($idcode),
        //     'op'=>'Shahkar'
        // );

        // // $url = rtrim("https://inquery.ir/:70");

        
        // $handler = curl_init("https://inquery.ir/:70");
		// curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
		// curl_setopt($handler, CURLOPT_POSTFIELDS, $params);
		// curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
		// $response = curl_exec($handler);
        // $output = curl_exec($handler);
        // dd($response);
        // curl_close($handler);
        // return $output;
    
                

        // $searchline = new Searchline;
        // return $searchline->isMobileBelongsToPerson($this->mobile,$this->national_code);
    }

    public function getRaw(){
        return $this->rawContact;
    }
}