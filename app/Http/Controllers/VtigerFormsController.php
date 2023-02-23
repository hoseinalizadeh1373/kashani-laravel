<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\VTiger\CrmMethods;
use Illuminate\Support\Facades\Auth;

class VtigerFormsController extends Controller
{
    

     private $Contact_id = 0;
    public function form()
    {
        try{
            $contact = (new CrmMethods())->getContactByNationalCode(Auth::user()->national_code);
         
            
            
        }
        catch(\Exception $e){
            dd($e);
             $url = url('/client/form');
             return view('errors.errorCatch',['url'=>$url]);
        }
        
        $formname = $this->getFormName();
        return view('vtiger-forms.'.$formname, compact("contact"));
    }


    public function updateContact(Request $request){
        
    }


    public function uploadPic(Request $request){
        $id = Auth::User()->crm_contact_id;
        $base64 = base64_encode(file_get_contents($request->file('file_upload')->path()));
       
        $crm = new CrmMethods();
        $crm->uploadDocuments($base64,$id);
       
      
    }
    public function uploadPicProfile(Request $request)
    {
        $id = Auth::User()->crm_contact_id;
        $base64 = base64_encode(file_get_contents($request->file('file_upload')->path()));
        $extension = $request->file('file_upload')->extension();
        $crm = new CrmMethods();
        $crm->uploadProfilePic($base64,$id,$extension);
        return redirect('/client/form');
    }

    public function UploadCreateDocument(Request $request)
    {

        $id = Auth::User()->crm_contact_id;
        $base64 = base64_encode(file_get_contents($request->file('file_upload')->path()));
        $extension = $request->file('file_upload')->extension();
        $crm = new CrmMethods();
        $docid = $crm->CreateDocument($base64,$id,$request->get('upload_file'),$extension);
        $crm->addRelatedDoc($id,$docid);
        return redirect('/client/form');
        
    }
    public function addRelated()
    {
        $crm = new CrmMethods();
        $crm->addRelatedDoc();
    }

    private function getFormName(){
        return [
            User::CONTACT_TYPE_MORAGHEB => "moragheb",
            User::CONTACT_TYPE_NURSE => "nurse",
            User::CONTACT_TYPE_DOCTOR => "doctor",
        ][Auth::user()->contact_type];
    }

    public function test()
    {
        $code = "5729906803";
        try{
            $vtiger = new CrmMethods;
            $response = $vtiger->getContactByNationalCode($code);
            dump($response);
            if($response){
                echo "user exists <br>";
                $id= $response->id;
                $data =[
                    "id"=>$id,
                    "firstname"=>"abbas",
                ];
                $storedContact = $vtiger->updateContactInformation($data);
                dd($vtiger->getContactByNationalCode($code));
            }
            else{
                echo "user not exists<br>";
                $data=[
                    "cf_pcf_irc_1122"=>$code,
                    "lastname"=>"asd adas fsd ",
                    "mobile"=>"09320381685"
                ];
                $vtiger->createNewContact($data);
            }
        }
        catch(\Exception $ex){
            dd($ex->getMessage());
        }
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'cf_pcf_irc_1122'=> 'required|numeric',
        ]);

        try{
            $vtiger = new CrmMethods;
            $contact = $vtiger->getContactByNationalCode($request["cf_pcf_irc_1122"]);
            $data = $request->all();
                
            
            $mode = "";
            if ($contact) {
                $data["id"]=$contact->id;
                $mode = "update";
                $storedContact = $vtiger->updateContactInformation($data);
            } else {
                $mode = "create";
                $storedContact = $vtiger->createNewContact($request->all());
            }
    
            if(!$storedContact){
                $data = [
                    "success"=>false,
                    "mode"=>$mode
                ];
            }
            else{
                $data = [
                    "success"=>true,
                    "mode"=>$mode
                ];
            }
    
        }
        catch(\Exception $e){
            $data = [
                "success"=>false,
                "mode"=>$mode,
                "message"=>$e->getMessage()
            ];
        }

        return response()->json($data);
       
    }

 }
