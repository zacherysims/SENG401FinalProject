@extends('layouts.app')

@section('styles')
    h2, p {
        color: lightgray;
    }

    .article {
        background-color: #292b2d; 
        color: lightgray;
        margin-top: 20px;
        margin-bottom: 20px;
        overflow: auto;
        padding: 10px;
    }
    .article:hover {background-color: #505050;}

    img {
        float: left;
        margin-right: 10px;
    }

@endsection

@section('content')
<div class="fullscreen" style="background-image: url(nebula.jpg); padding: 5%;">
<h1 class = "page_heading">Forum</h1>                

@endsection

@section('scripts')
    $(document).ready(function() {

        $('.article').click(function() {
            window.location = $(this).data("url");
        });

    });

@endsection