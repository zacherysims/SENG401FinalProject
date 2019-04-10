@extends('layouts.app')

@section('styles')
    h2, p {
        color: lightgray;
    }

    .searchArea {
        background-color: transparent; 
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
        opacity: 0.5;
        border-radius: 100px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
        border: none;
        font-size: 18px;
        text-indent: 10px;
        outline: none;
    }

    .coolradiobutton{
        border: none;
        padding: 10px;
        margin: 5px;
    }

    .btn {
        background-color: #292b2d;
        color: lightgray;
        opacity: 0.9;
    }

    span {
        color:  #292b2d;
    }

@endsection

@section('content')
<h1 class = "page_heading">Search the Cosmos (or just the site)</h1>                

<form class ="searchArea" action="/results">
<input class="searchbar" type="text" name="query"><br>
<div style="display: block; margin-left: auto; margin-right: auto; width: 50%; text-align: center;">
    <span>
    <input class="coolradiobutton" style="margin-top: 20px;" type="radio" name="type" value="News" checked>News
    </span>
    <span>
    <input class="coolradiobutton" type="radio" name="type" value="Forums">Forums
    </span>
    <span>
    <input class="coolradiobutton" type="radio" name="type" value="Pictures">Pictures<br>
    </span>
    <input class="btn" type="submit" style="margin-top: 20px; padding-left: 20px; padding-right: 20px;" name="search" value="Search">
</div>
</form>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> c53e087a4be0229a4e0de944529d688340c3275a
