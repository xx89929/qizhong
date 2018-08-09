<?php

namespace App\Admin\Controllers;

use App\Models\News;

use App\Models\NewsTag;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class NewsController extends Controller
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
        return Admin::grid(News::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->title('标题');
            $grid->tags('标签')->display(function ($tags){
                $tags = array_map(function ($tag){
                   return "<span class='label label-success'>{$tag['tag_name']}</span>";
                },$tags);
                return join('&nbsp;',$tags);
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
        return Admin::form(News::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title','标题');
            $form->text('description','描述');
            $form->multipleSelect('tags','标签')->options(
                NewsTag::all()->pluck('tag_name','id')
            );
            $form->image('banner','新闻横幅')->uniqueName()->resize(555,331);
            $form->text('author','作者');
            $form->url('original_href','原创连接')->rules('nullable');
            $form->number('look_num','查看记录数量')->default(rand(100,200));
            $form->number('share_num','分享记录数量')->default(rand(50,99));
            $form->editor('content','新闻内容');

            $form->datetime('release_at','发布时间');

            $form->switch('index_display','是否显示首页')->states($this->index_display);

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
