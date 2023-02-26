<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\VTiger\CrmMethods;
use Illuminate\Support\Facades\Auth;

class VtigerFormsController extends Controller
{
    
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

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function uploadPic(Request $request){
        $id = Auth::User()->crm_contact_id;
        $base64 = base64_encode(file_get_contents($request->file('file_upload')->path()));
       
        $crm = new CrmMethods();
        $crm->uploadDocuments($base64,$id);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function uploadPicProfile(Request $request)
    {
        $crm = new CrmMethods();
        $crm->uploadProfilePic($request->file('file_upload'),Auth::User()->crm_contact_id);
        return response()->json(['success'=>'you']);
        // return redirect('/client/form');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function UploadCreateDocument(Request $request)
    {
        $crm = new CrmMethods();
    
        $file = $request->file('file_upload');
        $filename = $request->get('upload_file') . "." . $file->extension();
        $docTitle  = trans("vtiger.".$request->get("upload_file"));

        $docid = $crm->CreateDocument(
                $file,
                Auth::User()->crm_contact_id,
                $filename,
                $docTitle
            );

        $crm->addRelatedDoc(Auth::User()->crm_contact_id,$docid);

        return redirect('/client/form');

    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'cf_pcf_irc_1122'=> 'required|numeric',
        ]);

        $nationalCode = $request[config('Fields.nationalcode')];

        try{
            $vtiger = new CrmMethods;
            $contact = $vtiger->getContactByNationalCode($nationalCode);
            $data = $request->all();
            
            $actionMode = "";
            if ($contact) {
                $data["id"] = $contact->id;
                $actionMode = "update";
                $storedContact = $vtiger->updateContactInformation($data);
            } else {
                $actionMode = "create";
                $storedContact = $vtiger->createNewContact($request->all());
            }
    
            if(!$storedContact){
                $data = [
                    "success"=>false,
                    "mode"=>$actionMode
                ];
            }
            else{
                $data = [
                    "success"=>true,
                    "mode"=>$actionMode
                ];
            }
    
        }
        catch(\Exception $e){
            $data = [
                "success"=>false,
                "mode"=>$actionMode,
                "message"=>$e->getMessage()
            ];
        }

        return response()->json($data);
       
    }

    private function getFormName(){
        return [
            User::CONTACT_TYPE_MORAGHEB => "moragheb",
            User::CONTACT_TYPE_NURSE => "nurse",
            User::CONTACT_TYPE_DOCTOR => "doctor",
        ][Auth::user()->contact_type];
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

    public function getrelated()
    {
        $crm =new CrmMethods();
        $crm->retrieve();
        //  $crm->retrieve_related();
        // $crm->query_related();
    }
 }
/* 
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
 */