<?php

namespace App\Admin\Controllers;

use App\Models\WebSet;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class WebSetController extends Controller
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

            $content->header('header');
            $content->description('description');

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
        return Admin::grid(WebSet::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->logo_path('LOGO')->image(config('disks.url'),240,78);
            $grid->web_name('网站名称');
            $grid->seo_name('SEO名称');
            $grid->web_name('网站名称');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(WebSet::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->image('logo_path','上传LOGO')->removable()->help('240*78像素');
            $form->text('web_name','网站名称');
            $form->text('seo_name','SEO名称');
            $form->text('seo_keywords','SEO关键词');
            $form->text('seo_info','网站描述');
            $form->text('phone','手机');
            $form->text('tel','电话');

        });
    }
}
