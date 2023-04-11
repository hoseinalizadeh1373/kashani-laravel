<?php

use App\Http\Controllers\Auth\SmsLoginController;
use App\Http\Controllers\VtigerFormsController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\VTiger\CrmMethods;


/* Route::get("/",function(){

    // $serach = new Searchline;
    // $res = $serach->isMobileBelongsToPerson("09155326344","0901328928");
    // dd($res);
    return view("home");
}); */


Route::get("/testing",function(){
   $crm = new CrmMethods;
   $con = $crm->getContactByNationalCode("5729906803");
   $data = ($con->getRaw());
dd($data);
   $data["mobile"]="09370331680";
   $crm->updateContactInformation($data);
});


Route::post("webGaurdLogin/{user}",function(User $user){
    auth('web')->login($user);
    return true;
})->name('webGaurdLogin');

// crm entrance
Route::post("/crme/checkContact",[App\Http\Controllers\CrmEntranceController::class,"checkContact"])->middleware(["guest"]);
Route::get("/crme/{token}",[App\Http\Controllers\CrmEntranceController::class,"welcome"])->middleware(["guest"]);

Route::middleware("auth")->prefix("client")->as("client.")->group(function(){
    Route::middleware("fullVerified")->group(function(){

        Route::get("/form",[VtigerFormsController::class,"form"])->name("form");    

        Route::post("/update",[VtigerFormsController::class,"update"])->name("update");    

    });
});

Route::get("/test","TestController@test");

Route::middleware("throttle:sendVerifyCodeLimit")->group(function(){
    Route::get("/mobile/login",[SmsLoginController::class,"login"]);
});

Route::get("/mobile/check",[SmsLoginController::class,"checkVerification"]);

Route::post("testupload",[VtigerFormsController::class,"uploadPic"]);
Route::post("testuploadprofile",[VtigerFormsController::class,"uploadPicProfile"]);
Route::post("createDocument",[VtigerFormsController::class,"UploadCreateDocument"]);
Route::get("addrelated",[VtigerFormsController::class,"addRelated"]);
Route::get("getrelated",[VtigerFormsController::class,"getrelated"]);

Auth::routes();

Route::get('{path}', function () {
    return view('spa');
})->where('path', '(.*)');