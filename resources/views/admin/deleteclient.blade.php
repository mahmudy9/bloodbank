@extends('admin.layout')


@section('content')
<h3>Delete client {{$client->name}}</h3>
    <br>
    <hr>
  <div class="row justify-content-center">

    <div class="col-sm-6">
        <form action="{{url('/admin/clients/destroy')}}" method="post" >
            @csrf
            @method('delete')
            <input type="hidden" name="clientid" value="{{$client->id}}" />
            <button type="submit" class="btn btn-danger">Delete Client</button>
        </form>
    </div>
    <div class="col-sm-6">
      <form action="{{url('/admin/clients/dontdestroy')}}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary">Dont Delete Client</button>
      </form>
    </div>
  </div>


@endsection
