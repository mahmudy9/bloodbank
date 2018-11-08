@extends('admin.layout')

@section('content')
<h3>Donation Requests</h3>
@include('errors')
@include('status')

<table class="table">
    <tr>
        <td>ID</td>
        <td>Client</td>
        <td>Name</td>
        <td>Age</td>
        <td>Blood Type</td>
        <td>Bags</td>
        <td>Hospital</td>
        <td>Hospital address</td>
        <td>Phone</td>
        <td>Governerate</td>
        <td>City</td>
        <td>Details</td>
        <td>Created At</td>
        <td>Delete</td>
    </tr>
    @foreach($donations as $don)
        <tr>
            <td>{{$don->id}}</td>
            <td>{{$don->client->name}}</td>
            <td>{{$don->name}}</td>
            <td>{{$don->age}}</td>
            <td>{{$don->blood->type}}</td>
            <td>{{$don->bags}}</td>
            <td>{{$don->hospital}} </td>
            <td>{{$don->hospital_address}}</td>
            <td>{{$don->phone}}</td>
            <td>{{$don->governerate->name}}</td>
            <td>{{$don->city->name}}</td>
            <td>{{$don->details}}</td>
            <td>{{$don->created_at}}</td>
        <td><a class="btn btn-danger" href="{{url('admin/donations/delete/'.$don->id)}}">Delete Donation</a></td>
    </tr>
        @endforeach
</table>

{{$donations->links()}}
@endsection