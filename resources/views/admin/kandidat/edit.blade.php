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
      <form action="/admin/kandidat/{{$kandidat->id}}/update-kandidat" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Kandidat</label>
          <input name="namakandidat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="namakandidat" value="{{$kandidat->namakandidat}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Foto</label>
          <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="namakandidat">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1"></label>
          <input name="status" type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="namakandidat" value="0">
        </div>
        <div class="modal-footer">
          <a href="/admin/kandidat" class="btn btn-warning btn btn-sm">Kembali</a>
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