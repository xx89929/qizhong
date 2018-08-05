<?php

namespace App\Http\Controllers\Home;

use App\Models\Banner;
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


        return view('pc.home.index.index',[
            'banners' => $banners,
        ]);
    }
}
