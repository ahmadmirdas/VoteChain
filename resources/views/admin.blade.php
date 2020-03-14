@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Selamat Datang di Sistem Evoting Menggunakan Teknologi Blockchain Ethereum</p>
{{--     <div class="container">
    	<div class="row">
			<div class="col-md-3">
				<h3>Control TPS 1</h3>
					<form action="{{ route('admin.verify1') }}" method="post">
						{{ csrf_field() }}
						<select name="status" id="" class="form-control">
							<option value="1">ON</option>
							<option value="0">OFF</option>
						</select>
						<br>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>

			<div class="col-md-3">
				<h3>Control TPS 2</h3>
					<form action="{{ route('admin.verify2') }}" method="post">
						{{ csrf_field() }}
						<select name="status" id="" class="form-control">
							<option value="1">ON</option>
							<option value="0">OFF</option>
						</select>
						<br>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div> --}}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
