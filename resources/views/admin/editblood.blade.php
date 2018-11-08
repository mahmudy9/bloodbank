@extends('admin.layout')

@section('content')

<h3>Edit Blood Type</h3>
@include('errors')
<form action="{{url('/admin/updateblood')}}" method="post">
@csrf
@method('put')
    <div class="form-group">
        <label for="name" >Name</label>
        <input type="text" class="form-control" name="type" value="{{$blood->type}}" />
        <input type="hidden" name="bloodid" value="{{$blood->id}}" />
    </div>
    <button type="submit" class="btn btn-primary" >Update Blood</button>
</form>

@endsection
