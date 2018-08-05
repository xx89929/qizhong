<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Navs extends Model
{
    use ModelTree,AdminBuilder;
    public $timestamps = false;



    public static function selectOptions()
    {
        $options = (new static())->buildSelectOptions();

        return collect($options)->prepend('默认', 0)->all();
    }

    public function scopeGetTopNavs($query){
        return $query->where('parent_id','0')->orderBy('order');
    }


    public function scopeGetSubNavs($query){
        return $query->where('parent_id','>','0')->orderBy('order');
    }

}
