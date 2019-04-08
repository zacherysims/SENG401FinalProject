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
        $counter = 0;
        foreach($articles as $article){
            $articles[$counter]['title'] = ucwords($articles[$counter]['title']);
            $articles[$counter]['title'] = str_ireplace("Science Release: ", "",$articles[$counter]['title']);
            $articles[$counter]['title'] = str_ireplace("Photo Release: ", "",$articles[$counter]['title']);
            $articles[$counter]['title'] = str_ireplace("&amp;", "&",$articles[$counter]['title']);

            $date=date_create( $articles[$counter]['pub_date']);
            $articles[$counter]['pub_date'] = date_format($date,"F j, Y");
            $counter++;
        }
        
        return view('news.index',['articles' => $articles]);
    }
}
