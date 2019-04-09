@extends('layouts.app')

@section('styles')
    h2, p {
        color: lightgray;
    }

    .thread {
        background-color: #292b2d; 
        color: lightgray;
        margin-top: 20px;
        margin-bottom: 20px;
        overflow: auto;
        padding: 10px;
    }
    .thread:hover {background-color: #505050;}

    img {
        float: left;
        margin-right: 10px;
    }

    .btn {
        float: right;
        background-color: #292b2d;
        color: lightgray;
    }

@endsection

@section('content')
<div>
    <button class="btn" onclick="location.href='/forum/create'">Create A New Thread!</button>
    <h1 class = "page_heading">Forum</h1>  
</div>              
@foreach($threads as $thread)
<a href="/forum/show/{{$thread->id}}" style="text-decoration: none;"><div class = 'thread' >
            <h2>{{$thread->title}} <span style="float: right; font-size:10px;">Thread ID: {{$thread->str}} </span></h2>
            Submitted by User: {{$thread->getUser()}}
            <br>
            <br>
        </div>
        </a>
@endforeach
@endsection
