@extends('layouts.app')

@section('styles')
    h2, p {
        color: lightgray;
    }
    .div_element:hover{}
    input, textarea{
        width: 100%;
        background-color: #505050;
        color: white;
    }

    .form-control, .form-control:focus{
        background-color: #505050;
        color: white;
    }

@endsection

@section('content')
<h1 class="page_heading">Create a New Thread</h1>
<div class = 'div_element' >
    <form method="POST" action="/forum">
        @csrf
        <div class="form-group">
        <span>Title:</span> <br><input class="form-control" name="Title" id="title" type="text"></input>
        </div>
        <div class="form-group">
        <span>Content:</span> <br><textarea class="form-control" name="Content" rows=10></textarea> 
        </div>
        <div class="form-group">
        <input class="btn" type=submit value="Submit"></input> 
        </div>
</div>
@endsection