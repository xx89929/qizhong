<?php

namespace App\Admin\Controllers;


use App\Http\Controllers\Api\FilesManageController;
use App\Models\Navs;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class NavsController extends Controller
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

            $content->body(Navs::tree(function ($tree) {
                $tree->branch(function ($branch) {
//                    $src = config('admin.upload.host') . '/' . $branch['logo'] ;
//                    $logo = "<img src='$src' style='max-width:30px;max-height:30px' class='img'/>";

                    return "{$branch['order']} - {$branch['title']}";
                });
            }));
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
        return Admin::grid(Navs::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Navs::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->select('parent_id','父级')->options(Navs::selectOptions());
            $form->number('order','排序');
            $form->text('title','标题')->rules('max:18',[
                'max' => '最多18个字符',
            ]);
            $form->image('banner_img','横幅图片')->uniqueName()->removable()->help('1920*450像素')->resize(1920,450);
            $form->select('template','使用模板')->help('采集模板路径：views/pc/home/sub-tmeplate/')->options(function () {
                $FilesManage = new FilesManageController();

                $res = $FilesManage->getTemplateFiles();
                $res[' '] = '空';
                return $res;
            });
            $form->text('banner_big_title','大标题');
            $form->text('banner_title','标题');
            $form->text('banner_small_title','小标题');

        });
    }
}
