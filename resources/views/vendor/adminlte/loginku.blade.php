<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>E-voting</title>
  </head>
  <body style="margin-top: 78px; background-image: url(assets/img/election.png); background-size: cover;">
    <!-- Form Login -->
    <div class="container">
        <h3 class="text-center" style="padding-top: 70px; font-family: Viga;">Login Halaman Pemilih</h3>
        <div class="row justify-content-center">
            <div class="row login">
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="col-lg">    
                    <p class="text-center" style="font-size: 1em;">Masukkan NIK
                    <form method="GET" action="{{ route('coblos') }}">
                      <div class="form-group">
                        <div class="row">
                            <label for="nik" class="col-sm-2 col-form-label">{{ __('NIK') }}</label>
                            <div class="col-sm-10">
                                <input type="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" aria-describedby="nik" placeholder="Masukkan NIK" value="{{ old('nik') }}" required autocomplete="nik" name="nik" autofocus>
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                      </div>
                      
                      <div class="row justify-content-center mb-0">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">{{ __('Masuk') }}</button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jqueryku -->
    <script src="bootstrap/js/dist/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/dist/jquery.easing.1.3.js"></script>
    <script src="script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>