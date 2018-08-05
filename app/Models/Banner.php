<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';

    public function scopeGetAllBanners($query){
        return $query->where('is_display',1)->orderBy('sort');
    }
}
