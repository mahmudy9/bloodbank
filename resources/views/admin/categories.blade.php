@extends('admin.layout')

@section('content')


<h3>Categories</h3>
<br>
@include('status')
@include('errors')
<form action="/admin/categories/create" method="post">
@csrf
@method('post')
<div class="form-group">
    <label for="name">Name:</label>
    <input class="form-control" value="{{old('name')}}" type="text" name="name" />

</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary" >Add Category</button>
</div>
</form>

<br>
<hr>
<table class="table">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    @foreach($cats as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td> <a href="{{url('/admin/categories/edit/'.$cat->id)}}" class="btn btn-info" >Edit</a> </td>
            <td> <a href="{{url('/admin/categories/delete/'.$cat->id)}}" class="btn btn-danger" >Delete</a></td>
        </tr>

    @endforeach
</table>
@endsection
