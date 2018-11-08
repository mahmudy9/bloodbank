@extends('admin.layout')

@section('content')


<h3>Cities</h3>
@include('status')
@include('errors')
<form action="{{url('/admin/articles/update')}}" method="post" enctype="multipart/form-data">
@csrf
@method('put')
<div class="form-group">
    <label for="title">Title:</label>
    <input class="form-control" value="{{$article->title}}" type="text" name="title" />
    <input type="hidden" name="articleid" value="{{$article->id}}" />
</div>
<div class="row">
<div class="form-group col-sm-6">
<label for="categoryid">Category</label>
    <select class="form-control" name="categoryid">
    @foreach($cats as $cat)
        <option
        @if($article->category_id == $cat->id)
            selected
        @endif
         value="{{$cat->id}}">{{$cat->name}}</option>
    @endforeach
</select>
</div>
<div class="form-group col-sm-6">
    <label for="image">Image:</label>
    <input class="custom-file-input" type="file" name="image" />

</div>
</div>
<div class="form-group">
</div>
<div class="form-group">
    <textarea  name="body" rows="15" id="area">{!! $article->body !!}</textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary" >Update Article</button>
</div>
</form>
@endsection
