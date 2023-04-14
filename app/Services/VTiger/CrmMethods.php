<?php

namespace App\Services\VTiger;

use GuzzleHttp\Psr7;

/*
 * This Source Code Form is subject to the terms of the Mozilla Public License, v.2.0.
 * If a copy of the MPL was not distributed with this file,
 * you can obtain one at http://mozilla.org/MPL/2.0/.
 */

class CrmMethods
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    private $api;

    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->api = new ApiCall();
    }



    /**
     * Undocumented function
     *
     * @param [type] $data
     * @return void
     */
    public function createNewContact($data)
    {

        $data["assigned_user_id"] = "19x5";
        $contact =  $this->api->call(
            "default/create",
            [
                "elementType"=>"Contacts",
                "element"=>json_encode($data),
            ],
            "POST"
        );

        return new CrmContact($contact);
    }


    /**
     * Undocumented function
     *
     * @param [type] $contactNumber
     * @return CrmContact
     */
    public function getContact($id)
    {
        $contact =  $this->api->call(
            "default/query",
            [
                "query"=>"select * from Contacts where id = '$id';",
            ],
            "GET"
        );

        return isset($contact[0]) ? (new CrmContact($contact[0])) : null;
    }


    /**
     * Undocumented function
     *
     * @param [type] $nationalCode
     * @return CrmContact
     */
    public function getContactByNationalCode($nationalCode)
    {
        $contact =  $this->api->call(
            "default/query",
            [
                "query"=>"select * from Contacts where cf_pcf_irc_1122 = '$nationalCode';",
            ],
            "GET",
            null
        );

        return isset($contact[0]) ? new CrmContact($contact[0]) : null;
    }


    /**
     * Undocumented function
     *
     * @param [type] $contactNumber
     * @return CrmContact
     */
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


    /**
     * Undocumented function
     *
     * @param [type] $data
     * @return void
     */
    public function updateContact($data)
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


    public function getRelatedDocuments($id = null)
    {
        $data = [
            "id" => "12x235156",
            "relatedType" => "Contacts",
            "relatedLabel"=>"Contacts",

        ];
        $documents =  $this->api->call(
            "default/retrieve_related",
            $data,
            "GET"
        );

        dd($documents);
    }


    /**
     * Undocumented function
     *
     * @param [type] $fileAddress
     * @param [type] $contactId
     * @return void
     */
    public function uploadProfilePic($fileAddress, $contactId)
    {

        $base64 = $this->toBase64($fileAddress);
        $ext = $this->getExtension($fileAddress);

        $data= [
            "record"=> $contactId,
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

        return true;

    }


    /**
     * Undocumented function
     *
     * @param [type] $fileBase64
     * @param [type] $contactId
     * @param [type] $name
     * @return void
     */
    public function CreateDocument($contactId, $fileBase64, $filename, $title)
    {
        $data = [
            "element"=>json_encode([
                "assigned_user_id"=>$contactId,
                "notes_title" => $title
            ]),
            "file"=>json_encode([
                "name" => $filename,
                "content" => $fileBase64,
            ])
        ];

        $res = $this->api->call(
            "extended/createdocument",
            $data,
            "POST"
        );

        return $res->docid ?? null;

    }


    /**
     * Undocumented function
     *
     * @param [type] $contactId
     * @param [type] $docid
     * @return void
     */
    public function addRelatedDoc($contactId, $docid)
    {
        $data = [

            "sourceRecordId" => $contactId,
            "relatedRecordId" => "15x" . $docid,
            "relationIdLabel"=>"Documents",

        ];

        $res = $this->api->call(
            "extended/add_related_records",
            $data,
            "POST"
        );

        return true;

    }


    /**
     * Undocumented function
     *
     * @param [type] $contactId
     * @return void
     */
    public function deleteContant($contactId)
    {
        $contact =  $this->api->call(
            "default/delete",
            [
                "id"=>$contactId,
            ],
            "POST"
        );

        return new CrmContact($contact);
    }

    /**
     * Undocumented function
     *
     * @param [type] $fileAddress
     * @return void
     */
    public function getExtension($fileAddress)
    {
        return $fileAddress->extension();
    }

    /**
     * Undocumented function
     *
     * @param [type] $fileAddress
     * @return void
     */
    public function toBase64($fileAddress)
    {
        return base64_encode(file_get_contents($fileAddress->path()));
    }


     public function getDocuments($id)
     {
         $data = [
             "query" => "select * from Documents ",
             "id" => $id,
             "relatedLabel"=>"Documents",
         ];

         return $this->api->call(
             "default/query_related",
             $data,
             "GET"
         );



     }
     public function getFile($id)
     {
         $data = [
             "file_id" => $id,
         ];

         return $this->api->call(
             "extended/file_retrieve_by_id",
             $data,
             "GET"
         )[0] ??  null;

     }

     public function retrieve_related()
     {
         $data = [


             "id" => "12x227595",
             "relatedType" => "Documents",
             "relatedLabel"=>"Documents",

         ];

         $res = $this->api->call(
             "default/retrieve_related",
             $data,
             "GET"
         );

         dd($res);

     }
     public function getImage($imageid)
     {
         $data = [

             "file_id" => $imageid,
         ];

         $res = $this->api->call(
             "extended/file_retrieve_by_id",
             $data,
             "GET"
         );

         return ($res[0]->filepath);

     }


    /**
     * Undocumented function
     *
     * @return void
     */
    public function me()
    {
        return $this->api->call(
            "default/me",
        );
    }

    /**
     * Undocumented function
     *
     * @return void
     */
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

}

/*

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

} */



/*  public function getContactRelatedDocs()
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
 } */
