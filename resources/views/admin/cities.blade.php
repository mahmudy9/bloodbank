@extends('admin.layout')

@section('content')


<h3>Cities</h3>

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
