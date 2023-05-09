<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(["prefix"=>"wechat"],function (){
       Route::post("login",'WechatController@login');
       Route::post("decode",'WechatController@decode');
});

Route::group(["prefix"=>"pay"],function (){
    Route::post("create",'PayController@create');
    Route::post("order",'PayController@order');
});

