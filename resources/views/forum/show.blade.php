@extends('layouts.app')

@section('styles')
    h2, p {
        color: white;
    }

    .thread {
        background-color: #292b2d; 
        color: white;
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
<div class ="thread">
    <h1 class="thread"> {{$thread->title}}</h1>
    </div>
@endsection
