<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class TemplateCategory extends Model
{
    use ModelTree,AdminBuilder;
    protected $table = 'template_category';

    public $timestamps = false;


    public static function selectOptions()
    {
        $options = (new static())->buildSelectOptions();

        return collect($options)->prepend('默认', 0)->all();
    }
}
