<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{

    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(NewsTag::class, 'news_newstag', 'news_id','tags_id');
    }

    public function scopeIndexNews($query){
        return $query->where('index_display',1)->orderBy('id','desc');
    }


}
