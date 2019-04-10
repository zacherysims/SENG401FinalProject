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
      background: -webkit-linear-gradient(lightgrey, grey);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-size: 125%;
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
            <h2 style="font-size: 225%">{{$thread->title}} <span style="float:right; font-size:30%;">Thread ID: {{$thread->str}} </span></h2>
            <div>

            <h3>{{$thread->getPaddedContent()}}<h3>
            </div>
              <span style="float:right;">-{{$thread->getUser()}}</span>
            <br>
        </div>
        </a>
@endforeach
@endsection
