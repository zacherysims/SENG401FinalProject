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

@endsection

@section('content')
<div class="fullscreen" style="background-image: url(nebula.jpg); padding: 5%;">
<h1 class = "page_heading">Forum</h1>                
@foreach($threads as $thread)
<a href="javascript:void(0)" style="text-decoration: none;"><div class = 'thread'>
            <h2>{{$thread->title}} <span style="float: right; font-size:10px;">Thread ID: {{$thread->str}} </span></h2>
            Submitted by User: {{$thread->getUser()}}
            <br>
            <br>
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