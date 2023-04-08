<?php

namespace App\VTiger;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;

/*
 * This Source Code Form is subject to the terms of the Mozilla Public License, v.2.0.
 * If a copy of the MPL was not distributed with this file,
 * you can obtain one at http://mozilla.org/MPL/2.0/.
 */

class ApiCall
{
    private $httpClient;
    public function __construct()
    {
        $this->httpClient = new Client($this->getHttpClientOptions());
    }

    public function call($address, $params=[], $method="GET")
    {
        $res = $this
            ->httpClient
            ->request(
                $method,
                "$address",
                $this->getRequestOptions($params, $method)
            );

        $contents = $res->getBody()->getContents();
        $contents = json_decode($contents);

        if (!$contents->success) {
            return false;
        }

        return $contents->result;
    }


    private function getHttpClientOptions()
    {
        $crmUrl = env("CRM_API_URL");
        return [
            'base_uri' => $crmUrl,
            'curl' => array( CURLOPT_SSL_VERIFYPEER => false, )
        ];
    }

    private function getRequestOptions($params, $method)
    {
        $parameters = $method == "POST"
            ? [ "form_params" =>$params]
            : [ "query" => $params ];

        return
          array_merge(
              ['auth' => [env('CRM_USERNAME'),env("CRM_PASSWORD")],],
              $parameters
          );
    }
    /*
$parameters = $method == "POST"
            ? [ "form_params" =>$params,
            "multipart"=>[
                'name' => 'file_8_1',
                'contents' =>Psr7\Utils::tryFopen('/storage/1.png', 'r')
                          ]
             ]
            : [ "query" => $params ];

    */
}
