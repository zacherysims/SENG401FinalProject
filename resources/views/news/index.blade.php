@extends('layouts.app')

@section('styles')
    h2, p {
        color: lightgray;
    }

    .article {
        background-color: #292b2d; 
        color: lightgray;
        margin-top: 20px;
        margin-bottom: 20px;
        overflow: auto;
        padding: 10px;
    }
    .article:hover {background-color: #505050;}

    img {
        float: left;
        margin-right: 10px;
    }

@endsection

@section('content')
<div class="fullscreen" style="background-image: url(nebula.jpg); padding: 5%;">
<h1 class = "page_heading">Latest Hubble News Releases</h1>                
  
   
@foreach($articles as $article)
        <div class = 'article' data-url={{$article['link']}}>
            <h2>{{$article['title']}}</h2>
            @if(count($article)===9)
                <img src = {{$article['thumbnail']}}></img>
            @endif
            {{$article['pub_date']}}
            <br>
            <br>
            {{$article['description']}}
            
        </div>
    @endforeach


</div>
@endsection

@section('scripts')
    $(document).ready(function() {

        $('.article').click(function() {
            window.location = $(this).data("url");
        });

    });

@endsection