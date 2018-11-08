@extends('admin.layout')

@section('content')


<h3>Blood Types</h3>
@include('status')
@include('errors')
<form action="/admin/createblood" method="post">
@csrf
@method('post')
<div class="form-group">
    <label for="type">Type:</label>
    <input class="form-control" value="{{old('type')}}" type="text" name="type" />

</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary" >Add Blood Type</button>
</div>
</form>

<br>
<hr>
<table class="table">
    <tr>
        <td>ID</td>
        <td>Type</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    @foreach($bloods as $blood)
        <tr>
            <td>{{$blood->id}}</td>
            <td>{{$blood->type}}</td>
            <td> <a href="{{url('/admin/editblood/'.$blood->id)}}" class="btn btn-info" >Edit</a> </td>
            <td> <a href="{{url('/admin/deleteblood/'.$blood->id)}}" class="btn btn-danger" >Delete</a></td>
        </tr>

    @endforeach
</table>
@endsection
