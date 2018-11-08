@extends('admin.layout')


@section('content')
<h3>Delete Contact</h3>
    <br>
    <hr>
  <div class="row justify-content-center">

    <div class="col-sm-6">
        <form action="{{url('/admin/contacts/destroy')}}" method="post" >
            @csrf
            @method('delete')
            <input type="hidden" name="contactid" value="{{$contact->id}}" />
            <button type="submit" class="btn btn-danger">Delete Contact</button>
        </form>
    </div>
    <div class="col-sm-6">
      <form action="{{url('/admin/contacts/dontdestroy')}}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary">Dont Delete Contact</button>
      </form>
    </div>
  </div>


@endsection
