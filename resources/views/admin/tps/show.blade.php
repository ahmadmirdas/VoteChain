@extends('adminlte::page')

@section('title', 'Evoting')

@section('content')
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ Session::get('success') }}
</div>
@endif
<div class="panel panel-default">
  <div class="">
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
      {{session('sukses')}}
    </div>
    @endif
    <div class="modal-body">
      <div class="col-6">
        <h1>Data Pemilih</h1>
      </div>
      <div class="col-6">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Tambah Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <form action="{{ route('buat.pemilih') }}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">NBI</label>
                    <input name="NBI" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NBI">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">TPS</label>
                    <input name="tps_id" type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tps_id" value="{{ $pemilih->id }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input name="status" type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="status" value="0">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
      <br>

      <table class="table table-hover">
        <tr>
          {{-- <th>#</th> --}}
          <th>NBI</th>
          <th>Nama</th>
          <th>Status</th>
        </tr>
        @foreach($data_pemilih as $item)
        <tr>        
          {{-- <td>{{ $item->id }}</td> --}}
          <td>{{ $item->NBI }}</td>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->status }}</td>
        </tr>
        @endforeach
    </table>
  </div>
</div>
</div>
@endsection