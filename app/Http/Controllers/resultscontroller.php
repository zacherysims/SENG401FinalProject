<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultsController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $type = request('type');
        $query = request('query');
        
        $relevantarticles = array();
        if(is_null($query)){
            return view('search.searchview');
        }
        if($type === 'News'){
        $url = "http://hubblesite.org/api/v3/external_feed/esa_feed";
        $rsp = file_get_contents($url);
        $allarticles = json_decode($rsp, true);
        $counter = 0;
        $relevantcounter = 0;
        foreach($allarticles as $article){
            $allarticles[$counter]['title'] = ucwords($allarticles[$counter]['title']);
            $allarticles[$counter]['title'] = str_ireplace("Science Release: ", "",$allarticles[$counter]['title']);
            $allarticles[$counter]['title'] = str_ireplace("Photo Release: ", "",$allarticles[$counter]['title']);
            $allarticles[$counter]['title'] = str_ireplace("&amp;", "&",$allarticles[$counter]['title']);

            $date=date_create( $allarticles[$counter]['pub_date']);
            $allarticles[$counter]['pub_date'] = date_format($date,"F j, Y");
            if(strpos($allarticles[$counter]['title'], $query)!==FALSE){
                $relevantarticles[$relevantcounter] = $allarticles[$counter];
                $relevantcounter++;
            }
            $counter++;
        }
    return view('search.resultsview',['items' => $relevantarticles, 'type' => $type, 'query' => $query]);
}

    else if($type === 'Forums'){
        
    }

    else if($type === "Pictures"){
       $url = "https://images-api.nasa.gov/search?keywords=";
       $url .= urlencode($query);

       $rsp = file_get_contents($url);
       //decoding a json file
       $pictures = json_decode($rsp, true);
        return view('search.resultsview', ['items' => $pictures['collection']['items'], 'type' => $type, 'query' => $query]);
    }
}
}
