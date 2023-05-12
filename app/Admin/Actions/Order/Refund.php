<?php

namespace App\Admin\Actions\Order;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelWeChat\Facade;

class Refund extends RowAction
{
    protected $app;
    public function __construct()
    {
        $this->app =  Facade::payment("default");
        parent::__construct();
    }
    public $name = '退款';

    public function handle(Model $model)
    {

        $mess = "退款成功";
        try{
            $this->app->refund->byOutTradeNumber($model->id, $model->out_order_number, $model->amount, $model->amount, array(

                'refund_desc' => '用户退款',
            ));
        }catch (\Exception $exception){
            $mess = $exception->getMessage();
        }
        return $this->response()->success($mess)->refresh();
    }

    public function dialog()
    {
        $this->confirm('确定退款？');
    }

}
