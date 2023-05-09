<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Overtrue\LaravelWeChat\Facade;


class PayController
{
    public function create()
    {
        return date("Ymd") . rand(1, 1000);
    }

    public function order(Request $request)
    {
        $orderId = $request->post("order_id");

        $payment = Facade::payment("default");
        $jssdk = $payment->jssdk;

        return $jssdk->bridgeConfig($orderId, false); // 返回数组
    }
}
