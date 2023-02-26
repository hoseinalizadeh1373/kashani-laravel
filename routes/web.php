<?php

use App\Http\Controllers\Auth\SmsLoginController;
use App\Http\Controllers\VtigerFormsController;
use App\Services\ContactVerifier;
use App\Services\Searchline\Searchline;
use Illuminate\Support\Facades\Route;
use App\VTiger\CrmMethods;


Route::get("/",function(){

    // $serach = new Searchline;
    // $res = $serach->isMobileBelongsToPerson("09155326344","0901328928");
    // dd($res);
    return view("home");
});
Route::get("/testing",function(){
    return view('home');
});

// crm entrance
Route::get("/crme/{token}",[App\Http\Controllers\CrmEntranceController::class,"entrance"])->middleware(["guest"]);

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



// Route::get('/',[VtigerFormsController::class,"index"]);
// Route::get('/test',[VtigerFormsController::class,"test"]);
// Route::post('/register',[VtigerFormsController::class,"register"]);
/* 
Route::get('/describe',function(){
    dd((new CrmMethods)->describe());
});
Route::get('/me',function(){
    dd((new CrmMethods)->me());
});
Route::get('/hsy',function(){
    dd((new CrmMethods)->getContactByNationalCode("5729906803"));
}); */
