<?php

namespace App\Services\Searchline;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use \Http;

class ApiCall
{
    private $httpClient;
    public function __construct()
    {
        // $this->httpClient = new Client($this->getHttpClientOptions());
        
    }

    public function call($params=[], $action)
    {

      /*   header('Content-Type: text/html; charset=utf-8');
		$mobile = array('09370331680');
		$idcode = array('5729906803');
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

        dd("Ads");
 */


        $crmUrl = env("SEARCHLINE_URL");
        $params = $this->reqParams($params,$action);
        dd($params);
        $response = Http::withOptions([
                'verify' => false,
                'debug' => fopen('hsydebug', 'w'),
            ])
            ->withHeaders([
                "Content-Type" => "text/html",
                "charset" => "utf-8"
            ])
            ->asForm()
            ->baseUrl($crmUrl)
            ->post("/",$params);


        dd($response->body());
        

            
     /*   $method = "POST";
        $res = $this
            ->httpClient
            ->request(
                $method,
                $this->getRequestOptions($params,$action)
            );

        $contents = $res->getBody()->getContents();
        $contents = json_decode($contents);

        if (!$contents->success) {
            return false;
        }

        return $contents->result; */
    }


 
    private function reqParams($params,$operation)
    {
        return 
            array_merge(
                [
                    'token' => env("SEARCHLINE_TOKEN") ,
                    "op" => $operation
                ],
                $params
            );
      
    }
}
