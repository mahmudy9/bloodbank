@extends('admin.layout')

@section('content')
  <h3>confirm you want to delete {{$blood->type}} Blood Type
      <br>
      <hr>
  <div class="row">

    <div class="col-sm-6">
        <form action="{{url('/admin/destroyblood')}}" method="post" >
            @csrf
            @method('delete')
            <input type="hidden" name="bloodid" value="{{$blood->id}}" />
            <button type="submit" class="btn btn-danger">Delete Blood Type</button>
        </form>
    </div>
    <div class="col-sm-6">
      <form action="{{url('/admin/dontdestroyblood')}}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary">Dont Delete Blood Type</button>
      </form>
    </div>
  </div>

@endsection
