@extends('admin.layout')

@section('content')


<h3>Cities</h3>
@include('status')
@include('errors')
<form action="{{url('/admin/articles/create')}}" method="post" enctype="multipart/form-data">
@csrf
@method('post')
<div class="form-group">
    <label for="title">Title:</label>
    <input class="form-control" value="{{old('title')}}" type="text" name="title" />
</div>
<div class="row">
<div class="form-group col-sm-6">
<label for="categoryid">Category</label>
    <select class="form-control" name="categoryid">
        <option selected>select...</option>
    @foreach($cats as $cat)
        <option value="{{$cat->id}}">{{$cat->name}}</option>
    @endforeach
</select>
</div>
<div class="form-group col-sm-6">
    <label for="image">Image:</label>
    <input class="custom-file-input" value="{{old('image')}}" type="file" name="image" />

</div>
</div>
<div class="form-group">
</div>
<div class="form-group">
    <textarea  name="body" rows="15" id="area">{{old('body')}}</textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary" >Add Article</button>
</div>
</form>

<br>
<hr>
@foreach($articles as $article)
<div class="card">
  <div class="card-header">
    <h3>{{$article->title}}</h3>
  </div>
  <div class="card-body">
    <p><small>category: {{$article->category->name}} , by {{$article->user->name}} , created {{$article->created_at}}</small></p>
    <p class="card-text">{!! substr($article->body , 0 , 100) !!}</p>
    <div class="row">
    <div class="col-sm-4">
    <a href="{{url('/admin/articles/show/'.$article->id)}}" class="btn btn-primary">Continue Reading</a>
    </div>
    <div class="col-sm-4">
    <a href="{{url('/admin/articles/edit/'.$article->id)}}" class="btn btn-info">Edit Article</a>
    </div>
    <div class="col-sm-4">
    <a href="{{url('/admin/articles/delete/'.$article->id)}}" class="btn btn-danger">Delete Article</a>
    </div>

    </div>
  </div>
</div>
@endforeach
{{$articles->links()}}
@endsection
