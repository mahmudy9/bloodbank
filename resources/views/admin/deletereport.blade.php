@extends('admin.layout')


@section('content')
<h3>Delete Report</h3>
    <br>
    <hr>
  <div class="row justify-content-center">

    <div class="col-sm-6">
        <form action="{{url('/admin/reports/destroy')}}" method="post" >
            @csrf
            @method('delete')
            <input type="hidden" name="reportid" value="{{$report->id}}" />
            <button type="submit" class="btn btn-danger">Delete Report</button>
        </form>
    </div>
    <div class="col-sm-6">
      <form action="{{url('/admin/reports/dontdestroy')}}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary">Dont Delete Report</button>
      </form>
    </div>
  </div>


@endsection
