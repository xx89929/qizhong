<?php

namespace App\Http\Controllers\Home;

use App\Models\Cases;
use App\Models\Navs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CaseInfoController extends Controller
{

    public function index(Request $request){
        $case_id = $request->get('case_id');
        $case = Cases::find($case_id);
        $case->category = $case->navs()->get();


        $parent_id= $case->category->first()->parent_id;

        $crumbs_last = Navs::find($parent_id);

        return view('pc.home.case_info.index',['case' => $case,'crumbs_last' => $crumbs_last]);
    }
}
