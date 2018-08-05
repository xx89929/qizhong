<?php

namespace App\Admin\Controllers;

use App\Models\TemplateCategory;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class TemplateCategoryController extends Controller
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

            $content->body(TemplateCategory::tree(function ($tree) {
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
        return Admin::grid(TemplateCategory::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(TemplateCategory::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('parent_id','父级')->options(TemplateCategory::selectOptions());
            $form->number('order','排序');
            $form->text('title','标题');
        });
    }
}
