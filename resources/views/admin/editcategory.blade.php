@extends('admin.layout')

@section('content')

<h3>Edit Category</h3>
    <h4>Your about to edit {{$cat->name}} category</h4>
<br>
@include('errors')
<form action="{{url('/admin/categories/update')}}" method="post">
@csrf
@method('put')
    <div class="form-group">
    <input type="text" value="{{$cat->name}}" class="form-control" name="name" />
    <input type="hidden" name="categoryid" value="{{$cat->id}}" />
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update Category</button>
    </div>
</form>


@endsection