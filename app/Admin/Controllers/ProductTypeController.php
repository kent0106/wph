<?php

namespace App\Admin\Controllers;

use App\Base;
use \App\Models\ProductType;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ProductTypeController extends Controller
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

            $content->header('产品分类');
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

            $content->header('产品类型');
            $content->description('编辑');

            $content->body($this->form()->edit($id));
        });
    }


    public function show()
    {
        echo "<script>history.go(-1);</script>";
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('产品类型');
            $content->description('新建');

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
        return Admin::grid(ProductType::class, function (Grid $grid) {
            $grid->actions(function ($actions) {
                $actions->disableView();
            });
            $grid->disableExport();
            $grid->id('ID')->sortable();
            $grid->name('名称')->color('');
            $grid->status('状态');
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
        return Admin::form(ProductType::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '名称')->rules('required', [
                'required' => '请填写产品分类名称',
            ]);
            $form->hidden('pid', '父类id')->value(1);
            $form->switch('status', '状态')->states(Base::getStates())->default(1);
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
