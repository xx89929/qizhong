<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class NewsTag extends Model
{
    protected $table = 'newstag';

    public $timestamps = false;


    public function news() : BelongsToMany
    {
        return $this->belongsToMany(News::class, 'news_newstag', 'tags_id','news_id');
    }
}
