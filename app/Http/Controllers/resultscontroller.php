<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class ResultsController extends Controller
{
  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */
  function getrelevantarticles($query, $url)
  {
    $relevantarticles = array();
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
      if(strpos(strtolower($allarticles[$counter]['title']), strtolower($query))!==FALSE){
        $relevantarticles[$relevantcounter] = $allarticles[$counter];
        $relevantcounter++;
      }
      $counter++;
    }
    return $relevantarticles;
  }



  public function index()
  {
    $type = request('type');
    $query = request('query');

    $relevantarticles = array();
    if(is_null($query)){
      return view('search.searchview');
    }
    if($type === 'News'){

      $relevantarticles = $this->getrelevantarticles($query, "http://hubblesite.org/api/v3/external_feed/esa_feed");
      $relevantarticles = array_merge($relevantarticles, $this->getrelevantarticles($query, "http://hubblesite.org/api/v3/external_feed/jwst_feed"));

      usort($relevantarticles, function($a, $b)
      {
        return (strtotime($b["pub_date"]) - strtotime($a["pub_date"]));
      });


      return view('search.resultsview',['items' => $relevantarticles, 'type' => $type, 'query' => $query]);
    }

    else if($type === 'Forums'){
      $relevantThreads = array();
      $threads = Thread::all();
      $counter = 0;
      foreach($threads as $thread){
        if(strpos(strtolower($thread->title), strtolower($query))!==FALSE){
          $relevantThreads[$counter] = $thread;
          $counter++;
        }
      }
      return view('search.resultsview', ['items'=> $relevantThreads, 'type'=> $type, 'query' => $query]);
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
