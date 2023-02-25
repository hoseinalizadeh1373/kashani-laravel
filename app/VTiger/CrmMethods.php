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
    public function uploadProfilePic($file,$id)
    {

        $base64 = $this->ToBase64($file);
        $ext = $this->getExtension($file);
        $data= [
            "record"=> $id,
            "files"=>json_encode(
                [
                    [
                        "name"=>"personal_image.".$ext,
                        "content" =>$base64
                    ]
                ]
            )

               ];

               $result = $this->api->call(
                "extended/uploadcontactsimage",
                $data,
                "POST"
               );
       


              
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
    public function CreateDocument($file,$id,$name)
    {
     $ext =  $this->getExtension($file);
     $base64 = $this->ToBase64($file);
        $data = [
            "element"=>json_encode([
                "assigned_user_id"=>$id,
                "notes_title" => $name
            ]),
            "file"=>json_encode([
                "name" =>$name.".".$ext,
                "content" =>$base64,
            ])
        ];
        
        $res = $this->api->call(
            "extended/createdocument",
            $data,
            "POST"
        );
        
        return $res->docid;
    }
    public function addRelatedDoc($id,$docid)
    {
        $data = [
            
            "sourceRecordId" => $id,
            "relatedRecordId" => "15x".$docid,
            "relationIdLabel"=>"Documents",
            
        ];
        
        $res = $this->api->call(
            "extended/add_related_records",
            $data,
            "POST"
        );

        
    
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

public function getExtension($file)
{
    return $file->extension();
}

public function ToBase64($file)
{
        return base64_encode(file_get_contents($file->path()));
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
