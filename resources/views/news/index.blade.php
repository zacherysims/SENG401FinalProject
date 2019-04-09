@extends('layouts.app')

@section('styles')
    h2, p {
        color: lightgray;
    }

    .div_element:hover {background-color: #505050;}

    img {
        float: left;
        margin-right: 10px;
        border-radius: 5px;
    }

@endsection

@section('content')

<h1 class = "page_heading">Latest Hubble News Releases</h1>


@foreach($articles as $article)
        <a href="javascript:void(0)" style="text-decoration: none;"><div class = 'div_element article' data-url={{$article['link']}}>
            <h2>{{$article['title']}}</h2>
            @if(count($article)===9)
                <img src = {{$article['thumbnail']}}></img>
            @endif
            {{$article['pub_date']}}
            <br>
            <br>
            {{$article['description']}}
        </div>
        </a>
    @endforeach



@endsection

@section('scripts')
    $(document).ready(function() {

        $('.article').click(function() {
            window.location = $(this).data("url");
        });

    });

@endsection
