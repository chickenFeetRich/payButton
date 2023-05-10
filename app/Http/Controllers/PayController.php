<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Overtrue\LaravelWeChat\Facade;


class PayController
{
    protected $app;
    public function __construct()
    {
        $this->app =  Facade::payment("default");
    }

    public function create()
    {
        return date("Ymd") . rand(1, 1000);
    }

    public function order(Request $request)
    {
        $orderId = $request->post("order_id");
        $openid = $request->post("openid");

        $payment = Facade::payment("default");
        $jssdk = $payment->jssdk;
        $result = $this->app->order->unify([
            'body' => '天天互娱',
            'out_trade_no' => $orderId,
            'total_fee' => 88,
            'notify_url' => 'https://pay.jubaohuizhong.con/api/wechat/notice', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'trade_type' => 'JSAPI', // 请对应换成你的支付方式对应的值类型
            'openid' => $openid,
        ]);
        return $jssdk->bridgeConfig($request['prepay_id'], false); // 返回数组
    }

    /**
     *
     */
    public function notice(){
        return [

        ];
    }
}
