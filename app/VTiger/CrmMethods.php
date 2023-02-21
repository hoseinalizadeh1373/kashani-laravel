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
    

    public function uploadDocuments($data){
        // id hossein 12x227595
        // field name file_8_1
        
        $data = [
            "format"=> 1,
            "files" => json_encode(
                [
                    [
                        "name"=>"testfile.jpg",
                        "content"=>base64_encode(file_get_contents("1-5.jpg"))
                    ],
                ]
            )
        ];

        $res = $this->api->call(
            "extended/uploadbase64file",
            $data,
            "POST"
        );
        
        $data = [
            "id"=> "12x227595",
            "cf_pcf_ulf_1016" => $res[0]
        ];
        
        $res = $this->updateContactInformation($data);

        dd($res);
        
        
    }
    public function uploadProfilePic()
    {
        $data= [
            "record"=> "12x227595",
            "files"=>json_encode(
                [
                    [
                        "name"=>"1.png",
                        "content" =>base64_encode(file_get_contents("1.png"))
                    ]
                ]
            )

               ];

               $result = $this->api->call(
                "extended/uploadcontactsimage",
                $data,
                "POST"
               );
       


               dd($result);
    }
    public function getContactRelatedDocs()
    {
         $data= [
            "id"=>"12x227595",
            "relatedType"=>"Documents",
            "relatedLabel"=>"Documents",
        ];

        

        $res = $this->api->call(
            "default/retrieve_related",
            $data,
            "GET"
        );

        dd($res);

        exit;
    }
    public function CreateDocument()
    {

       
        $data = [
            "element"=>json_encode([
                "assigned_user_id"=>"12x227595",
                "notes_title" => "test"
            ]),
            "file"=>json_encode([
                "name" =>"1.png",
                "content" =>base64_encode(file_get_contents("1.png")),
            ])
        ];
        
        $res = $this->api->call(
            "extended/createdocument",
            $data,
            "POST"
        );
        dd($res);
    }
    public function addRelatedDoc()
    {
        $data = [
            
            "sourceRecordId" => "12x227595",
            "relatedRecordId" => "15x228902",
            "relationIdLabel"=>"Documents",
            
        ];
        
        $res = $this->api->call(
            "extended/add_related_records",
            $data,
            "POST"
        );

        
        dd($res);
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
