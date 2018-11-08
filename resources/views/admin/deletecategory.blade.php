@extends('admin.layout')

@section('content')
  <h3>confirm you want to delete {{$cat->name}} Blood Type
      <br>
      <hr>
  <div class="row">

    <div class="col-sm-6">
        <form action="{{url('/admin/categories/destroy')}}" method="post" >
            @csrf
            @method('delete')
            <input type="hidden" name="categoryid" value="{{$cat->id}}" />
            <button type="submit" class="btn btn-danger">Delete Category</button>
        </form>
    </div>
    <div class="col-sm-6">
      <form action="{{url('/admin/categories/dontdestroy')}}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary">Dont Delete Category</button>
      </form>
    </div>
  </div>

@endsection
