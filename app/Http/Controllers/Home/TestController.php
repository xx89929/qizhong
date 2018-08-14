<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{

    public function index(){
        return view('pc.home.sub-template.wechat_program');
    }
}
