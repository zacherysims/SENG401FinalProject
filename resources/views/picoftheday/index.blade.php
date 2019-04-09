@extends('layouts.app')
    @section('styles')

        h2, h3, p {
            color: lightgray;
        }
        .picdaycontainer {
            background-color: #292b2d; 
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: 20px;
            margin-right: 20px;
            padding: 5%;
        }
        img.picday {
            max-height: 50%;
            max-width: 100%;
        }
    @endsection 
    @section('content')
    <h1 class="page_heading"> Picture of the Day </h1>
                <div class="title">
                 <div class="picdaycontainer"> 
                 <h2> {{$picture['title']}}</h2>
                 <p style="font-size:12px; text-align: left;">{{$picture['copyright']}} 
                 <span style="float:right;">{{$picture['date']}}</span>
                 </p>
                 <img class="picday" src={{$picture['url']}}></img>
                 <br>
                 <p style="font-size: 12px; margin-top: 20px; margin-bottom: 10px;"> {{$picture['explanation']}} </p>
                 </div>
                </div>
  
@endsection