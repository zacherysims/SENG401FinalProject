@extends('layouts.app')

@section('styles')
    h2 {
        color: lightgray;
    }

    .article {
        background-color: #292b2d; 
        margin-top: 20px;
        margin-bottom: 20px;
    }
@endsection

@section('content')
<div class="fullscreen" style="background-image: url(nebula.jpg); background-size: cover; padding: 5%;">
                
  
   
    @foreach($articles as $article)
        <div class = 'article'>
            <h2>{{$article['title']}}<br></h2>
        </div>
    @endforeach


</div>
@endsection