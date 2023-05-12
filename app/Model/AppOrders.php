<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/***
 * Class AppOrders
 * @package Model
 * @property $amount
 * @property $id
 * @property $uid
 * @property $goods_id
 */
class AppOrders extends Model
{
    protected $table  = "app_orders";

    public $timestamps = false;

    const ORDER_STATUS_WAIT_PAY = 0;
    const ORDER_STATUS_PAY = 1;//
    const ORDER_STATUS_REFUND_ING = 2;//退款中
    const ORDER_STATUS_REFUND = 3; //已退款
}
