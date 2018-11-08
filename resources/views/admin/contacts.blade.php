@extends('admin.layout')

@section('content')

<h3>Contacts</h3>

<br>
<hr>
<table class="table">

    <tr>
        <td>ID</td>
        <td>Client</td>
        <td>Subject</td>
        <td>Body</td>
        <td>Created At</td>
        <td>Delete</td>
    </tr>
    @foreach($contacts as $cont)
        <tr>
            <td>{{$cont->id}}</td>
            <td>{{$cont->client->name}}</td>
            <td>{{$cont->subject}}</td>
            <td>{{$cont->body}}</td>
            <td>{{$cont->created_at}}</td>
            <td><a class="btn btn-danger" href="{{url('/admin/contacts/delete/'.$cont->id)}}">Delete contact</a></td>
        </tr>
    @endforeach
</table>

{{$contacts->links()}}
@endsection
