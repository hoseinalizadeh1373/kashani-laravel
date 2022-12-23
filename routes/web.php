<?php

use App\Http\Controllers\VtigerFormsController;
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
