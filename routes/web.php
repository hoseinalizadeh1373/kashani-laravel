<?php

use App\Http\Controllers\VtigerFormsController;
use Illuminate\Support\Facades\Route;
use App\VTiger\CrmMethods;


Route::get('/',[VtigerFormsController::class,"index"]);
Route::get('/test',"VtigerFormsController@test");
Route::post('/register',"VtigerFormsController@register");

Route::get('/describe',function(){
    dd((new CrmMethods)->describe());
});
Route::get('/me',function(){
    dd((new CrmMethods)->me());
});
Route::get('/hsy',function(){
    dd((new CrmMethods)->getContactByNationalCode("5729906803"));
});