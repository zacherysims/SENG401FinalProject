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
            if(strpos($allarticles[$counter]['title'], $query)){
                $relevantarticles[$relevantcounter] = $allarticles[$counter];
                $relevantcounter++;
            }
            $counter++;
        }
    }

    else if($type === 'Forums'){
        /**
         * When forums is built
         */
    }

    else if($type === "Pictures"){
        /**
         * When pictures is built
         */
    }
    
        
    return view('search.resultsview',['items' => $relevantarticles, 'type' => $type, 'query' => $query]);
    }
}
