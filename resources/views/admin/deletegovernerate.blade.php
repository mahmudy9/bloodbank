@extends('admin.layout')

@section('content')
  <h3>confirm you want to delete {{$gov->name}} governerate
      <br>
      <hr>
  <div class="row">

    <div class="col-sm-6">
        <form action="{{url('/admin/destroygovernerate')}}" method="post" >
            @csrf
            @method('delete')
            <input type="hidden" name="governerateid" value="{{$gov->id}}" />
            <button type="submit" class="btn btn-danger">Delete Governerate</button>
        </form>
    </div>
    <div class="col-sm-6">
      <form action="{{url('/admin/dontdestroygovernerate')}}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary">Dont Delete Governerate</button>
      </form>
    </div>
  </div>

@endsection
