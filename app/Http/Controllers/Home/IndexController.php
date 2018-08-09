<?php

namespace App\Http\Controllers\Home;

use App\Models\Banner;
use App\Models\Cases;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::GetAllBanners()->get();
        $cases = Cases::IndexCase()->get();

        foreach ($cases as $key => $case){
            $cases[$key]->navs = $case->navs()->get();
        }

        $news = News::IndexNews()->get();

        foreach ($news as $key => $new) {
            $news[$key]->tags = $new->tags()->get();
        }


        return view('pc.home.index.index',[
            'banners' => $banners,
            'cases' => $cases,
            'news' => $news,
        ]);
    }
}
