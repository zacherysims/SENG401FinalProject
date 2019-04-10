@extends('layouts.app')

@section('styles')
p {
  color: lightgrey;
  background-color: #292b2d;
  border-radius: 10px;
  display: inline-block;
  margin-left: 10%;
  opacity: 0.9;
  padding-left: 10px;
  padding-right: 10px;
}

.form-control, .form-control:focus{
  width: 50%;
  background-color: #505050;
  color: white;
  border-radius: 20px;
  display: inline-block;
  margin-left: 10%;
  opacity: 0.9;
  padding-left: 10px;
  padding-right: 10px;
}

h3 {
  font-size: 100%

}

comment {
  color: black;
  text-color: white; 
}

.btn {
  border-radius: 20px;
}

textarea{
  margin: 20px;
}
@endsection

@section('content')
<div class ="div_element">
  <h2>{{$thread->title}} <span style="float:right; font-size:80%;"> </span></h2>
  <br>
  <h3>{{$thread->content}}</h3>
  <span style="float:right;"> -{{$thread->getUser()}}</span>
</div>

@foreach($comments as $comment)
<p><span> {{$comment->content}}</span><span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-{{$comment->user}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$comment->created_at}}</span></p><br>
@endforeach


    <form autocomplete="off" method="POST" action="/forum/show/{{$thread->id}}">
        @csrf
        
        <div class="form-group">
          <input type="text" class="form-control" name="Content" rows=1 placeholder="Add a Comment!"></input> 
          <input type="hidden" name="ThreadId" value={{$thread->id}}></input>
          <input class="btn" type=submit value="Comment"></input> 
        </div>
        <!-- <div class="form-group" style="display: inline;">
          <input class="btn" type=submit value="Comment"></input> 
        </div> -->

@endsection
