<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VTiger\CrmMethods;

class VtigerFormsController extends Controller
{
    
    public function index()
    {
        return view('vtiger-forms.moragheb');
    }

    public function __construct()
    {
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


    public function register(Request $request)
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
