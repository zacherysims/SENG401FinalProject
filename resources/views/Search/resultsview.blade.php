@extends('layouts.app')

@section('styles')
    h2, p {
        color: lightgray;
    }

    .item {
        background-color: #292b2d; 
        color: lightgray;
        margin-top: 20px;
        margin-bottom: 20px;
        overflow: auto;
        padding: 10px;
    }
    .item:hover {background-color: #505050;}

    img {
        float: left;
        margin-right: 10px;
    }

@endsection

@section('content')
<div class="fullscreen" style="background-image: url(nebula.jpg); padding: 5%;">
<h1 class = "page_heading">{{$type}} related to "{{$query}}"</h1>

@if(empty($items))
    <div class="item" style="text-align: center">
    <h1>We got nuthin, srry m8</h1>
</div>         
@elseif($type==='News')
@foreach($items as $article)
        <div class = 'item' data-url={{$article['link']}}>
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
@elseif($type==='Forums')
<div class= 'item'>
    <h2 style="text-align: center">This is where we would put the forums</h2><br>
    <h2 style="text-align: center">IF WE HAD ANY</h2>
</div>
@elseif($type==='Pictures')
<div class= 'item'>
    <h2 style="text-align: center">This is where we would put the pictures</h2><br>
    <h2 style="text-align: center">IF WE HAD ANY</h2>
</div>
@endif
@endsection

@section('scripts')
    $(document).ready(function() {

    $('.article').click(function() {
        window.location = $(this).data("url");
    });

    });

@endsection