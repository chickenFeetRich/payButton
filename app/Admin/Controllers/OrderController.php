<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Order\Refund;
use Encore\Admin\Controllers\AdminController;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Model\AppOrders;


class OrderController extends AdminController
{
    protected $title = 'Users';

    protected function grid()
    {
        $grid = new Grid(new AppOrders());
        $grid->model()->where("status", '>', AppOrders::ORDER_STATUS_WAIT_PAY);

        $grid->column('id', __('订单号'));
        $grid->column('amount', __('订单金额'))->display(function ($amount) {
            return bcdiv($amount, 100, 2) . "元";
        });
        $grid->column('uid', __('用户id'));
        $grid->column("status", __('订单状态'))->display(function ($status) {
            $txt = "-";
            switch ($status) {
                case AppOrders::ORDER_STATUS_PAY:
                    $txt = "已支付";
                    break;
                case AppOrders::ORDER_STATUS_REFUND_ING:
                    $txt = "退款中";
                    break;
                case AppOrders::ORDER_STATUS_REFUND:
                    $txt = "已退款";
                    break;
            }
            return $txt;
        });
        $grid->column('created_time', __('创建时间'))->display(function ($createTime) {
            return date("Y-m-d H:i:s", $createTime);
        });
        $grid->actions(function($action){
            $action->add(new Refund());
        });
        return $grid;
    }
}
