<?php

namespace App\Admin\Controllers;

use App\Models\Cases;

use App\Models\Navs;
use App\Models\TemplateCategory;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Intervention\Image\Filters\DemoFilter;

class CasesController extends Controller
{
    use ModelForm;

    protected $index_display = [
        'on'  => ['value' => 1, 'text' => '显示', 'color' => 'success'],
        'off' => ['value' => 0, 'text' => '关闭', 'color' => 'danger'],
    ];

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
        return Admin::grid(Cases::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('案例名称');
            $grid->href('案例链接')->urlWrapper();

            $grid->category('案例分类')->display(function ($cates){
                $cates = array_map(function ($cate){
                    return "<span class='label label-success'>{$cate['title']}</span>";
                },$cates);
                return join('&nbsp;',$cates);
            });

            $grid->navs('推送导航')->display(function ($navs){
                $navs = array_map(function ($nav){
                    return "<span class='label label-primary'>{$nav['title']}</span>";
                },$navs);
                return join('&nbsp;',$navs);
            });

            $grid->index_display('是否显示首页')->switch($this->index_display);
            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Cases::class, function (Form $form) {

            $form->display('id', 'ID');

            /**
             * greyscale 灰度
             *
             * blur(param) 模糊   @param 0-100
             */
            $form->text('name','案例名称');

            $form->image('cover_img','封面图片')->uniqueName()->removable()->resize(445,269)->blur(5)->brightness(-15)->insert(asset('img/watermark.png'),'bottom-left')->help('445*269像素');

            $form->image('pc_img','PC版截图')->uniqueName()->resize(1047,null,function ($constraint){
                $constraint->aspectRatio(); //按比例缩放
            })->removable()->help('1047*N 像素');

            $form->image('mobile_img','手机版截图')->uniqueName()->resize(300,null,function ($constraint){
                $constraint->aspectRatio(); //按比例缩放
            })->removable()->help('300*N 像素');


            $form->multipleSelect('navs','推送导航')->options(
                Navs::where('parent_id','<>',0)->pluck('title','id')
            );

            $form->url('href','案例连接')->rules('nullable')->help('以http://开头');

            $form->switch('index_display','是否显示首页')->states($this->index_display);

            $form->ueditor('content','模板内容');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
