<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $url = "http://hubblesite.org/api/v3/external_feed/esa_feed";
        $rsp = file_get_contents($url);
        $articles = json_decode($rsp, true);
        //dd($articles);
        
        return view('news.index',['articles' => $articles]);
    }
}
