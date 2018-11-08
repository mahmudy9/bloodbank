@extends('admin.layout')

@section('content')
  <h3>confirm you want to delete {{$city->name}} city that belongs to {{$city->governerate->name}} governerate
      <br>
      <hr>
  <div class="row">

    <div class="col-sm-6">
        <form action="{{url('/admin/destroycity')}}" method="post" >
            @csrf
            @method('delete')
            <input type="hidden" name="cityid" value="{{$cityid}}" />
            <button type="submit" class="btn btn-danger">Delete City</button>
        </form>
    </div>
    <div class="col-sm-6">
      <form action="{{url('/admin/dontdestroycity')}}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary">Dont Delete City</button>
      </form>
    </div>
  </div>

@endsection
