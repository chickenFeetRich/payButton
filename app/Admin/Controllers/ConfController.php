<?php


namespace App\Admin\Controllers;
use App\Admin\Actions\Order\Refund;
use App\Model\AppConf;
use App\Model\AppOrders;
use App\User;
use Encore\Admin\Form;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Grid;

class ConfController extends AdminController
{
    protected $title = '配置中心';

    protected function form()
    {
        $form = new Form(new AppConf());

        $form->text('key', __('配置键'));
        $form->text('value', __('配置值'));

        return $form;
    }

    protected function grid(){
        $grid = new Grid(new AppConf());

        $grid->column('id', __('配置id'));
        $grid->column('key', __('配置键'));
        $grid->column('value', __('配置值'));
        $grid->column('created_time', __('创建时间'));
        return $grid;
    }
}

