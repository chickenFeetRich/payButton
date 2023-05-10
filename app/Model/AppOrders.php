<?php

namespace Model;

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
}
