@extends('layouts.app')

@section('styles')
p {
  color: white;
  background-color: #292b2d;
  border-radius: 10px;
  display: inline-block;
  margin-left: 10%;
  opacity: 0.9;
  padding-left: 10px;
  padding-right: 10px;
}

.form-control, .form-control:focus{
  background-color: #505050;
  color: white;
}

h3 {
  font-size: 100%

}

img {
  float: left;
  margin-right: 50%;
}

comment {
  color: black;
  text-color: white; 
}
@endsection

@section('content')
<div class ="div_element">
  <h2>{{$thread->title}} <span style="float:right; font-size:80%;"> </span></h2>
  <br>
  <h3>{{$thread->content}}</h3>
  <span style="float:right;">-{{$thread->getUser()}}</span>
</div>

@foreach($comments as $comment)
<p><span> {{$comment->content}}</span><span> -{{$comment->user}} </p><br>
@endforeach

<div class = 'div_element' >
    <form method="POST" action="/forum/show/{{$thread->id}}">
        @csrf
        <div class="form-group">
        <textarea class="form-control" name="Content" value="Add a Comment!"></textarea> 
        </div>
        <div class="form-group">
        <input type="hidden" name="ThreadId" value={{$thread->id}}></input>
        <input class="btn" type=submit value="Submit"></input> 
        </div>
</div>
@endsection
