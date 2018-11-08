@extends('admin.layout')

@section('content')


<h3>Cities</h3>
@include('status')
@include('errors')
<form action="/admin/createcity" method="post">
@csrf
@method('post')
<div class="form-group">
    <label for="name">Name:</label>
    <input class="form-control" value="{{old('name')}}" type="text" name="name" />

</div>
<div class="form-group">
<label for="governerateid">Governerate</label>
    <select class="form-control" name="governerateid">
    @foreach($governerates as $gov)
        <option value="{{$gov->id}}">{{$gov->name}}</option>
    @endforeach
</select>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary" >Add City</button>
</div>
</form>

<br>
<hr>
<table class="table">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Governerate</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    @foreach($cities as $city)
        <tr>
            <td>{{$city->id}}</td>
            <td>{{$city->name}}</td>
            <td>{{$city->governerate->name}}</td>
            <td> <a href="{{url('/admin/editcity/'.$city->id)}}" class="btn btn-info" >Edit</a> </td>
            <td> <a href="{{url('/admin/deletecity/'.$city->id)}}" class="btn btn-danger" >Delete</a></td>
        </tr>

    @endforeach
</table>
@endsection
