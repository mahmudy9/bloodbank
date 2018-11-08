@extends('admin.layout')


@section('content')
<h3>Delete Donation with id {{$donation->id}} and for client {{$donation->client->name}} </h3>
    <br>
    <hr>
  <div class="row justify-content-center">

    <div class="col-sm-6">
        <form action="{{url('/admin/donations/destroy')}}" method="post" >
            @csrf
            @method('delete')
            <input type="hidden" name="donationid" value="{{$donation->id}}" />
            <button type="submit" class="btn btn-danger">Delete Donation Request</button>
        </form>
    </div>
    <div class="col-sm-6">
      <form action="{{url('/admin/donations/dontdestroy')}}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary">Dont Delete Donation Request</button>
      </form>
    </div>
  </div>


@endsection
