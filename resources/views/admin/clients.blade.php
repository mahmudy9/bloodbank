@extends('admin.layout')

@section('content')



<h3>Clients Data Table</h3>
@include('status')
@include('errors')
<table class="table">

    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Date Of Birth</td>
        <td>Blood type</td>
        <td>City</td>
        <td>Last Donation</td>
        <td>Created At</td>
        <td>Delete</td>
    </tr>

    @foreach($clients as $client)
        <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->name}}</td>
            <td>{{$client->email}}</td>
            <td>{{$client->dob}}</td>
            <td>{{$client->blood->type}}</td>
            <td>{{$client->city->name}}</td>
            <td>{{$client->last_donation}}</td>
            <td>{{$client->created_at}}</td>
            <td><a class="btn btn-danger" href="{{url('/admin/clients/delete/'.$client->id)}}">Delete</td>
        </tr>
    @endforeach

</table>
{{$clients->links()}}
@endsection
