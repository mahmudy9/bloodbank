@extends('admin.layout')

@section('content')

<h3>Edit Governerate</h3>
@include('errors')
<form action="{{url('/admin/updategovernerate')}}" method="post">
@csrf
@method('put')
    <div class="form-group">
        <label for="name" >Name</label>
        <input type="text" class="form-control" name="name" value="{{$gov->name}}" />
        <input type="hidden" name="governerateid" value="{{$gov->id}}" />
    </div>
    <button type="submit" class="btn btn-primary" >Update Governerate</button>
</form>

@endsection
