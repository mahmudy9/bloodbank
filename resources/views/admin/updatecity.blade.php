@extends('admin.layout')

@section('content')
<h3> Edit City </h3>
@include('errors')
<form action="{{url('admin/updatecity')}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" value="{{$city->name}}" name="name" />
        <input type="hidden" name="cityid" value="{{$city->id}}" />
    </div>
    <div class="form-group">
    <label for="governerateid">Governerate</label>
        <select class="form-control" name="governerateid">
        @foreach($governerates as $gov)
            <option
            @if($city->governerate->id == $gov->id)
                selected
            @endif
             value="{{$gov->id}}">{{$gov->name}}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" >Update City</button>
    </div>
</form>

@endsection
