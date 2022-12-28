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

        $crmUrl = env("SEARCHLINE_URL");
        
        $response = Http::baseUrl($crmUrl)
            ->post("/",$this->reqParams($params,$action));


        dd($response->status());
        

            
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
