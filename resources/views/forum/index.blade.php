@extends('layouts.app')

@section('styles')
    h2, p {
        color: lightgray;
    }

    #rounded {
      border-radius: 25px;
      border: 2px solid green;
      width: 600px;

      padding: 10px;
    }

    .thread {
        background-color: #292b2d;
        opacity: 0.9;
        color: lightgray;
        margin-top: 20px;
        margin-bottom: 20px;
        overflow: auto;
        padding: 10px;
        border-radius: 25px;
    }
    .thread:hover {background-color: #505050; opacity: 1;}

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
            <div style=" opacity: 0.5;">
            <h3 id = "rounded">{{$thread->getPaddedContent()}}<span style="float: right; font-size:4px;"></span><h3>
            </div>
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
