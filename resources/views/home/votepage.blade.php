<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <title>E-voting</title>
  </head>
  <body style="margin-top: 78px; background-image: url(../assets/img/election.png); background-size: cover;">
    <!-- Form Login -->
    <div class="container">
        <h3 class="text-center" style="padding-top: 10px; font-family: Viga;">SILAHKAN PILIH CALON PILIHAN ANDA</h3>
        <div class="row justify-content-center">
            <div class="row coblos">
                <div class="col-lg">
                    <h4 class="text-center" style="">1</h4>
                    <img src="../assets/img/election.png" width="250px" height="250px" alt="..." class="img-thumbnail">
                    <p>Ahmad Mirdas</p> 
                    <div class="form-check text-center">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                      <label class="form-check-label" for="exampleRadios1">
                        Coblos
                      </label>
                    </div>
                </div>
            </div>
            <div class="row coblos">
                <div class="col-lg">
                    <h4 class="text-center" style="">2</h4>
                    <img src="../assets/img/election.png" width="250px" height="250px" alt="..." class="img-thumbnail">
                    <p>Ahmad Mirdas</p> 
                    <div class="form-check text-center">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                      <label class="form-check-label" for="exampleRadios1">
                        Coblos
                      </label>
                    </div>                  
                </div>
            </div>
            <div class="row coblos">
                <div class="col-lg">
                    <h4 class="text-center" style="">3</h4>
                    <img src="../assets/img/election.png" width="250px" height="250px" alt="..." class="img-thumbnail">
                    <p>Ahmad Mirdas</p>
                    <div class="form-check text-center">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                      <label class="form-check-label" for="exampleRadios1">
                        Coblos
                      </label>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row justify-content-center">
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
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