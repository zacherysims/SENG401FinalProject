@extends('layouts.app')

@section('styles')

    .div_element:hover {background-color: #505050; opacity: 1;}
    h2, p {
        color: lightgray;
    }

    img {
        float: left;
        margin-right: 100%;
    }

    h3{
      background: -webkit-linear-gradient(#eee, #333);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-size: 350%;
    }

    .btn {
        position: absolute;
        right: 5%;
        background-color: #292b2d;
        color: lightgray;
        opacity: 0.9;
    }
    .btn:hover {background-color: #505050; opacity: 1;}

@endsection

@section('content')
<div>
    <button class="btn" onclick="location.href='/forum/create'">Create A New Thread!</button>
    <h1 class = "page_heading">Forum</h1>
</div>
@foreach($threads as $thread)
<a href="/forum/show/{{$thread->id}}" style="text-decoration: none;"><div class = 'div_element' >
            <h2 style="font-size: 300%">{{$thread->title}} <span style="float:right; font-size:80%;">Thread ID: {{$thread->str}} </span></h2>
            Submitted by User: {{$thread->getUser()}}
              <br>
              <br>
            <div style=" opacity: 0.5;">

            <h3>{{$thread->getPaddedContent()}}<h3>
            </div>
              <span style="float:right;"> click to see more </span>
            <br>
        </div>
        </a>
@endforeach
@endsection
