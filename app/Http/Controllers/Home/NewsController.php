<?php

namespace App\Http\Controllers\Home;

use App\Models\News;
use App\Models\NewsTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(Request $request){
        $tag_id = $request->get('tag_id');
        $tags = NewsTag::all();
        if($tag_id){
            $news =NewsTag::find($tag_id)->news;

        }else{
            $news = News::orderBy('created_at','desc')->paginate(15);
        }

        foreach ($news as $n){
            $n->tags = $n->tags()->get();
        }

        return view('pc.home.news.index',['news' => $news,'tags' => $tags]);
    }

    public function newsInfo(Request $request){
        $news_id = $request->get('news_id');

        $news = News::find($news_id);
        $pre_news = News::where('id','<',$news_id)->orderBy('id','desc')->first();
        $next_news = News::where('id','>',$news_id)->orderBy('id','asc')->first();

        $tags = $news->tags()->get();

        count($tags) > 1 ? $limit = 3 : $limit = 6;

        $test = collect();

        foreach ($tags as $key =>  $tag){
            $a[$key] = $tag->news()->limit($limit)->orderBy('id','desc')->get();
        }

        for ($i = 0 ; $i < count($a) ; $i++){
            foreach ($a[$i] as $re){
                $test->push($re);
            }
        }
        $related_news = $test->unique('id');

        return view('pc.home.news_info.index',[
            'news' => $news,
            'pre_news' => $pre_news,
            'next_news' => $next_news,
            'related_news' => $related_news
        ]);
    }
}
