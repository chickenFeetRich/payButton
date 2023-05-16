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
class AppConf extends Model
{
    protected $table  = "app_conf";

    public $timestamps = true;
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';


}
