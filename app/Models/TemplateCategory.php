<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TemplateCategory extends Model
{
    use ModelTree,AdminBuilder;
    protected $table = 'template_category';

    public $timestamps = false;

    public function cases() : BelongsToMany
    {
        return $this->belongsToMany(Cases::class,'cases_temlate_category','template_category_id','case_id');
    }


    public static function selectOptions()
    {
        $options = (new static())->buildSelectOptions();

        return collect($options)->prepend('默认', 0)->all();
    }


    //获取全部专题
    public function scopeGetSpecial($query){
        return $query->where('parent_id',8);
    }
}
