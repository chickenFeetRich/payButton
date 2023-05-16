<?php


namespace App\Http\Controllers;


use App\Model\AppConf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfController
{
    public function jump(Request $request)
    {
        $key =  $request->get('key');
        if(empty($key)){
            return [];
        }
        return AppConf::where('key' ,'=',$key)->first();
       //  return DB::getQueryLog();
    }
}
