<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PicDayController extends Controller
{
    //
    public function index(){
        $url = "https://api.nasa.gov/planetary/apod?api_key=mkarddWZ1NARiXSeil3nvJdmcQyHrFkhFpmoQjqB";
        $rsp = file_get_contents($url);
        //decoding a json file
        $picture = json_decode($rsp, true);
        $counter = 0;
        // foreach($articles as $article){
        //     $articles[$counter]['title'] = ucwords($articles[$counter]['title']);
        //     $articles[$counter]['title'] = str_ireplace("Science Release: ", "",$articles[$counter]['title']);
        //     $articles[$counter]['title'] = str_ireplace("Photo Release: ", "",$articles[$counter]['title']);
        //     $articles[$counter]['title'] = str_ireplace("&amp;", "&",$articles[$counter]['title']);

        //     $date=date_create( $articles[$counter]['pub_date']);
        //     $articles[$counter]['pub_date'] = date_format($date,"F j, Y");
        //     $counter++;
        // }
        return view('picoftheday.index', ['picture' => $picture]);
    }
}
