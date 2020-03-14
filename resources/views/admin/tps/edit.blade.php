@extends('adminlte::page')

@section('title', 'Evoting')

@section('content')
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ Session::get('success') }}
</div>
@endif

<div class="panel panel-default">
  @if(session('sukses'))
  <div class="alert alert-success" role="alert">
    {{session('sukses')}}
  </div>
  @endif
  <div class="row justify-content-center">
    <div class="modal-body">
      <form action="/admin/tps/{{$tps->id}}/update-tps" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="exampleInputEmail1">Nama TPS</label>
          <input name="namatps" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="namatps" value="{{$tps->namatps}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Jumlah DPT</label>
          <input name="jumlahdpt" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="namatps" value="{{$tps->jumlahdpt}}">
        </div>
        <div class="modal-footer">
          <a href="/admin/tps" class="btn btn-warning btn btn-sm">Kembali</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div> 
  </div>
</div>

@endsection

@section('js')
<script>
  CKEDITOR.replace('pesan');
</script>
@endsection