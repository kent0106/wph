<?php

namespace App\Admin\Controllers;

use App\Models\Common;
use App\Models\RechargeCard;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class RechargeCardController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('充值卡');
            $content->description('列表');
            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(RechargeCard::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->amount('充值金额');
            $grid->gift_amount('赠送金额');
            $grid->status('状态')->display(function ($released) {
                return $released ? '有效' : '无效';
            });
            $grid->created_at('创建时间');
            $grid->updated_at('修改时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(RechargeCard::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->currency('amount', '充值金额')->symbol('￥')->rules('required', [
                'required' => '请填写充值金额',
            ])->default(0);
            $form->currency('gift_amount', '赠送金额')->symbol('￥')->rules('required', [
                'required' => '请填写赠送金额',
            ])->default(0);
            $form->switch('status', '状态')->states(Common::getStates())->default(1);
        });
    }
}