@extends('admin.layout')

@section('content')
@include('status')
<h3>{{$article->title}}</h3>
<p><small>{{$article->category->name}}</small></p>
<p><small>By {{$article->user->name}} created at {{$article->created_at}}</small></p>
<br>
@if($article->image)
<img src="{{asset('/storage/'.$article->image)}}" height="200px" width="400px" />
@endif
<hr>
<div>{!!$article->body!!}</div>
@endsection
