@extends('admin.layout')

@section('content')

<h3>Reports</h3>

<br>
<hr>
<table class="table">

    <tr>
        <td>ID</td>
        <td>Client</td>
        <td>Body</td>
        <td>Created At</td>
        <td>Delete</td>
    </tr>
    @foreach($reports as $report)
        <tr>
            <td>{{$report->id}}</td>
            <td>{{$report->client->name}}</td>
            <td>{{$report->body}}</td>
            <td>{{$report->created_at}}</td>
            <td><a class="btn btn-danger" href="{{url('/admin/contacts/delete/'.$report->id)}}">Delete Report</a></td>
        </tr>
    @endforeach

</table>
{{$reports->links()}}
@endsection
