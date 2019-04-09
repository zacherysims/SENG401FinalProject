@extends('layouts.app')

@section('styles')
h2, p {
  color: white;
}

h3 {
  font-size: 250%

}

img {
  float: left;
  margin-right: 50%;
}

comment {
  
}
@endsection

@section('content')
<div class ="div_element">
  <h2>{{$thread->title}} <span style="float:right; font-size:80%;"> </span></h2>
  Submitted by User: {{$thread->getUser()}}
  <br>
  <br>
  <h3>{{$thread->content}}</h3>
</div>
<div class = "comment">
</div>
@endsection
