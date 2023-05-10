<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Model\AppOrders;
use Overtrue\LaravelWeChat\Facade;


class PayController
{
    protected $app;
    public function __construct()
    {
        $this->app =  Facade::payment("default");
    }

    public function create(Request $request)
    {
        $userId = $request->post("user_id");
        $goodsId = $request->post("goods_id");
        $openid = $request->post("openid");

        $order =  new AppOrders();
        $order->amount = 1;
        $order->goods_id = $goodsId;
        $order->uid = $userId;
        $order->save();
        $result = $this->app->order->unify([
            'body' => '天天互娱',
            'out_trade_no' => $order->id,
            'total_fee' => $order->amount,
            'notify_url' => 'https://pay.jubaohuizhong.con/api/pay/notice', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'trade_type' => 'JSAPI', // 请对应换成你的支付方式对应的值类型
            'openid' => $openid,
        ]);
        //prepay_id
        return $result;
    }

    public function order(Request $request)
    {
        $orderId = $request->post("order_id");

        $payment = Facade::payment("default");
        $jssdk = $payment->jssdk;

        return $jssdk->bridgeConfig($orderId, false); // 返回数组
    }

    /**
     *
     */
    public function notice(){
        return [

        ];
    }
}
