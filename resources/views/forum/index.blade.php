@extends('layouts.app')

@section('styles')

    .div_element:hover {background-color: #505050; opacity: 1;}
    h2, p {
        color: lightgray;
    }

    img {
        float: left;
        margin-right: 10px;
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
            <h2>{{$thread->title}} <span style="float: right; font-size:10px;">Thread ID: {{$thread->str}} </span></h2>
            Submitted by User: {{$thread->getUser()}}
              <br>
              <br>
            <div style=" opacity: 0.5;">
            <h3>{{$thread->getPaddedContent()}}<span style="font-size:4px;"></span><h3>
            </div>
            <br>
        </div>
        </a>
@endforeach
@endsection

