<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cases extends Model
{
    protected $table = 'cases';



//    public function setPcImgAttribute($PcImg)
//    {
//        if (is_array($PcImg)) {
//            $this->attributes['pc_img'] = json_encode($PcImg);
//        }
//    }
//
//
//    public function getPcImgAttribute($PcImg)
//    {
//        return json_decode($PcImg, true);
//    }
//
//
//    public function setMobileImgAttribute($MobileImg)
//    {
//        if (is_array($MobileImg)) {
//            $this->attributes['mobile_img'] = json_encode($MobileImg);
//        }
//    }
//
//
//    public function getMobileImgAttribute($MobileImg)
//    {
//        return json_decode($MobileImg, true);
//    }

    public function category() : BelongsToMany
    {
        return $this->belongsToMany(TemplateCategory::class,'cases_temlate_category','case_id','template_category_id');
    }

    public function navs() : BelongsToMany
    {
        return $this->belongsToMany(Navs::class,'cases_navs','case_id','nav_id');
    }

    public function scopeIndexCase($query){
        return $query->where('index_display',1)->orderBy('id','desc');
    }
}
