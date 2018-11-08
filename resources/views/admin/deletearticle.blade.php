@extends('admin.layout')


@section('content')
<h3>Delete Article with title {{$article->title}}</h3>
    <br>
    <hr>
  <div class="row justify-content-center">

    <div class="col-sm-6">
        <form action="{{url('/admin/articles/destroy')}}" method="post" >
            @csrf
            @method('delete')
            <input type="hidden" name="articleid" value="{{$article->id}}" />
            <button type="submit" class="btn btn-danger">Delete Article</button>
        </form>
    </div>
    <div class="col-sm-6">
      <form action="{{url('/admin/articles/dontdestroy')}}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary">Dont Delete Article</button>
      </form>
    </div>
  </div>


@endsection
