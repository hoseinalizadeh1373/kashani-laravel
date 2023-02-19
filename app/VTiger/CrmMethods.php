<?php

namespace App\VTiger;
use GuzzleHttp\Psr7;
/*
 * This Source Code Form is subject to the terms of the Mozilla Public License, v.2.0.
 * If a copy of the MPL was not distributed with this file,
 * you can obtain one at http://mozilla.org/MPL/2.0/.
 */

class CrmMethods
{
    private $api;
    
    public function __construct()
    {
        $this->api = new ApiCall;
    }

    public function me()
    {
        return $this->api->call(
            "default/me",
        );
    }
    
    public function describe()
    {
        return $this->api->call(
            "default/describe",
            [
                 "elementType"=>"Contacts",
            ],
            "GET"
        );
    }
    
    public function getContactByNationalCode($nationalCode)
    {
        $contact =  $this->api->call(
            "default/query",
            [
                "query"=>"select * from Contacts where cf_pcf_irc_1122 = '$nationalCode';",
            ],
            "GET"
            ,null
        );

        return new CrmContact($contact[0] ?? null);
    }

    public function getContactByContactNumber($contactNumber)
    {
        $contact =  $this->api->call(
            "default/query",
            [
                "query"=>"select * from Contacts where contact_no = '$contactNumber';",
            ],
            "GET"
        );

        
        return isset($contact[0]) ? (new CrmContact($contact[0])) : null;
    }
    
    public function updateContactInformation($data)
    {
        $contact =  $this->api->call(
            "default/revise",
            [
                "element"=>json_encode($data),
            ],
            "POST"
        );

        //--------------------------------------\
        
// $path = "/storage";
// $name = "/1.png";
$client = new \GuzzleHttp\Client();
        $res = $client->request('POST', 'https://my-saminnurses.ir/modules/ParsVT/ws/API/V2/vtiger/extended/uploadfile'
                    , [
            'auth'      => [ env('CRM_USERNAME'), env('CRM_PASSWORD') ],
            'multipart' => [
                [
                    'name'     => 'file_7_3',
                    'contents' =>Psr7\Utils::tryFopen(public_path().'/storage/1.png', 'r')
                    
                ],
                // [
                //     'name'     => 'FileInfo',
                //     'contents' => json_encode($fileinfo)
                // ]
            ],
        ]);

        //------------------------
        
        return $contact;
    }

    
    public function deleteContant($id)
    {
        $contact =  $this->api->call(
            "default/delete",
            [
                "id"=>$id,
            ],
            "POST"
        );
        return $contact;
    }


    public function createNewContact($data)
    {
        
        $data["cf_931"] = "مراقب";
        $data["assigned_user_id"] = "19x5";
        
        $contact =  $this->api->call(
            "default/create",
            [
                "elementType"=>"Contacts",
                "element"=>json_encode($data),
            ],
            "POST"
        );
        
        return $contact;
    }


    //سمانه نوروزی
    // 12x111
    // cf_pcf_irc_1122
    //0630185646
    //09055116302
    /*
    "firstname"=>"samane",
    "lastname"=>"norozi",
    "mobile"=>"09055116302",
    "CON32"=>"CON32",
    'assigned_user_id' => '19x5',
     */
}
