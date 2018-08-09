<?php

namespace App\Http\Controllers\Home;


use App\Models\Navs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebSiteController extends Controller
{

    public function web_website(Request $request){
        $nav_id = $request->get('nav');
        $nav = Navs::find($nav_id);
        if($nav->parent_id == 0){
            $webnavs = Navs::where('parent_id',$nav->id)->get();

            foreach ($webnavs as $key => $webnav) {
                $cases[$key] = $webnav->cases()->get();
            }


            $test = collect();
            for($i = 0 ;$i < count($cases) ; $i ++){
                foreach ($cases[$i] as $case){
                    $test->push($case);
                }
            }

            $cases = $test->unique('id');


        }else{
            $cases = $nav->cases()->get();

            foreach ($cases as $key => $case){
                $cases[$key]->navs = $case->navs()->get();
            }

            $webnavs = Navs::where('parent_id',$nav->parent_id)->get();

        }

        return view('pc.home.website.web_website',[
            'webnavs' => $webnavs,
            'cases' => $cases ,
            'nav' => $nav,
            ]);
    }
}
