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
        <h1>Data Suara Setiap TPS</h1>
      </div>
      <div class="col-6">
        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Tambah Data
        </button>
 --}}
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
                <form action="buat-tps" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama TPS</label>
                    <input name="namatps" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="namatps">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah DPT</label>
                    <input name="jumlahdpt" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jumlahdpt">
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
          <th>#</th>
          <th>Nama TPS</th>
          {{-- @foreach ($kandidat as $item)
          <th>{{ $item->namakandidat }}</th>
          @endforeach --}}
        </tr>
        {{-- {{ dd($data[0]->total_suara) }} --}}
        @foreach($tps as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{$item->namatps}}</td>
          <td><a href="{{ route('show.suara', $item->id) }}" class="btn btn-warning btn btn-sm">Show</a></td>
{{--           <td><a href="/admin/tps/{{$tps->id}}/delete-tps" class="btn btn-danger btn btn-sm" onclick="return confirm('Yakin mau dihapus')">Hapus</a></td>
 --}}      </tr>
      @endforeach
    </table>
  </div>
</div>
</div>
@endsection