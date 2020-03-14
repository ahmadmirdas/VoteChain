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
      <form action="/admin/pemilih/{{$pemilih->id}}/update-pemilih" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="exampleInputEmail1">NIK</label>
          <input name="NIK" type="text" readonly="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIK" value="{{$pemilih->NIK}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama</label>
          <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama" value="{{$pemilih->nama}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama TPS</label>
          <select name="tps_id" id="" class="form-control">
            @foreach ($tps as $item)
            <option value="{{ $item->id }}">{{ $item->namatps }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
          <input name="status" type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="status" value="{{$pemilih->status}}">
        </div>
          {{-- @foreach($data_kontak as $kontak)
          <td><img src="{{ asset('storage/'.$kontak->gambar) }}" alt="" height="100"></td>
          @endforeach --}}
        <div class="modal-footer">
          <a href="/admin/pemilih" class="btn btn-warning btn btn-sm">Kembali</a>
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