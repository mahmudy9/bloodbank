@extends('admin.layout')

@section('content')


<h3>Governerates</h3>
@include('status')
@include('errors')
<form action="/admin/creategovernerate" method="post">
@csrf
@method('post')
<div class="form-group">
    <label for="name">Name:</label>
    <input class="form-control" value="{{old('name')}}" type="text" name="name" />

</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary" >Add Governerate</button>
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
    @foreach($governerates as $governerate)
        <tr>
            <td>{{$governerate->id}}</td>
            <td>{{$governerate->name}}</td>
            <td> <a href="{{url('/admin/editgovernerate/'.$governerate->id)}}" class="btn btn-info" >Edit</a> </td>
            <td> <a href="{{url('/admin/deletegovernerate/'.$governerate->id)}}" class="btn btn-danger" >Delete</a></td>
        </tr>

    @endforeach
</table>
@endsection
