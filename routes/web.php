<?php

use App\Http\Controllers\Auth\SmsLoginController;
use App\Http\Controllers\VtigerFormsController;
use App\Services\ContactVerifier;
use Illuminate\Support\Facades\Route;
use App\VTiger\CrmMethods;


Route::get('/',[VtigerFormsController::class,"index"]);
Route::get('/test',[VtigerFormsController::class,"test"]);
Route::post('/register',[VtigerFormsController::class,"register"]);

Route::get('/describe',function(){
    dd((new CrmMethods)->describe());
});
Route::get('/me',function(){
    dd((new CrmMethods)->me());
});
Route::get('/hsy',function(){
    dd((new CrmMethods)->getContactByNationalCode("5729906803"));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/entrance/{token}",[App\Http\Controllers\CrmEntranceContoller::class,"entrance"]);

Route::middleware("auth")->prefix("client")->as("client.")->group(function(){

    Route::get("verification",[App\Http\Controllers\VerificationController::class,"verification"])->name("verification");
    
    Route::middleware("fullVerified")->group(function(){
    
    });

});

Route::get("/test","TestController@test");

Route::middleware("throttle:sendVerifyCodeLimit")->group(function(){
    Route::get("/mobile/login",[SmsLoginController::class,"login"]);
});

Route::get("/mobile/check",[SmsLoginController::class,"checkVerification"]);
