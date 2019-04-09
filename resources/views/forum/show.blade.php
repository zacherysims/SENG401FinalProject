@extends('layouts.app')

@section('styles')
    h2, p {
        color: white;
    }

    img {
        float: left;
        margin-right: 10px;
    }

@endsection

@section('content')
<div class ="div_element">
    <h1 class="thread"> {{$thread->title}}</h1>
    </div>
@endsection
