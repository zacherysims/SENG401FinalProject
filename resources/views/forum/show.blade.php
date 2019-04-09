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

    <h1 class="page_heading"> {{$thread->title}}}</h1>
@endsection
