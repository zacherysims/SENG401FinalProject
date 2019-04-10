@extends('layouts.app')

@section('styles')
    h2, p {
        color: lightgray;
    }

    .picture {
        margin-top: 20px;
        margin-bottom: 20px;
        padding: 10px;
    }
    .div_element:hover {background-color: #505050;}

    img {
        float: left;
        margin-right: 10px;
        border-radius: 5px;
    }

@endsection

@section('content')
<div class="fullscreen" style="background-image: url(nebula.jpg); padding: 5%;">
<h1 class = "page_heading">{{$type}} related to "{{$query}}"</h1>

@if(empty($items))
    <div class="div_element" style="text-align: center">
    <h1>We got nuthin, srry m8</h1>
</div>         
@elseif($type==='News')
@foreach($items as $article)
<a href="javascript:void(0)" style="text-decoration: none;"><div class = 'div_element' data-url={{$article['link']}}>
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
@foreach($items as $picture)
<<<<<<< HEAD
<a href="javascript:void(0)" style="text-decoration: none;"><div class="item" data-url={{str_replace('/collection.json', '~large.jpg"',$picture['href'])}}>
=======
<a href="javascript:void(0)" style="text-decoration: none;"><div class="div_element" data-url={{str_replace('/collection.json', '~orig.jpg"',$picture['links'][0]['href'])}}>
>>>>>>> c53e087a4be0229a4e0de944529d688340c3275a
        <img src={{$picture['links'][0]['href']}}></img>
        <br>
        <br>
        @if(array_key_exists('description', $picture['data'][0]))
        {!!$picture['data'][0]['description']!!}
        @endif
    </div>
@endforeach
@endif
@endsection

@section('scripts')
    $(document).ready(function() {

    $('.item').click(function() {
        window.location = $(this).data("url");
    });

    });

@endsection