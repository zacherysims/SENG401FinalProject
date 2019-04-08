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

@endsection

@section('content')
<div class="fullscreen" style="background-image: url(nebula.jpg); padding: 5%;">
<h1 class = "page_heading">Search the Cosmos (or just the site)</h1>                

<form class ="searchArea" action="/results">
Query: <br>
<input type="text" name="query"><br><br>
<input type="radio" name="type" value="News">News<br>
<input type="radio" name="type" value="Forums">Forums<br>
<input type="radio" name="type" value="Pictures">Pictures<br>
<input type="submit" name="search">
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