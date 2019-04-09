@extends('layouts.app')

@section('styles')
    h2, p {
        color: lightgray;
    }

    .searchArea {
        background-color: #292b2d; 
        color: lightgray;
        margin-top: 20px;
        margin-bottom: 20px;
        overflow: auto;
        padding: 10px;
    }

    img {
        float: left;
        margin-right: 10px;
    }
    .searchbar {
        border-radius: 100px;
        padding: 6px;
        padding-left: 20px;
        width: 1000px;
        border: none;
        margin-top: 12px;z
        margin-right: 12px;
        font-size: 18px;
        text-indent: 1px;
    }

    .coolradiobutton{
        border: none;
        padding: 10px;
        margin: 5px;
    }

@endsection

@section('content')
<div class="fullscreen" style="background-image: url(nebula.jpg); padding: 5%;">
<h1 class = "page_heading">Search the Cosmos (or just the site)</h1>                

<form class ="searchArea" action="/results">
Keyword: <br>
<input class="searchbar" type="text" name="query"><br>
<input class="coolradiobutton" style="margin-top: 20px;" type="radio" name="type" value="News" checked>News<br>
<input class="coolradiobutton" type="radio" name="type" value="Forums">Forums<br>
<input class="coolradiobutton" type="radio" name="type" value="Pictures">Pictures<br>
<input type="submit" style="margin-top: 20px; padding-left: 20px; padding-right: 20px;" name="search" value="Search">
</form>
</div>
@endsection

@section('scripts')
    $(document).ready(function() {

    $('.article').click(function() {
        window.location = $(this).data("url");
    });

    });

@endsection