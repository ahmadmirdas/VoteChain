<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <title>E-voting</title>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  </head>
  <body style="margin-top: 78px; background-image: url(../assets/img/election.png); background-size: cover;">
    {{-- <form action="{{ route('coblos1.kandidat') }}" method="POST">
    {{ csrf_field() }} --}}
    <div class="container" id="app">
        <h3 class="text-center" style="font-family: Viga;">SILAHKAN PILIH CALON PILIHAN ANDA</h3>
        <div class="row justify-content-center">
            <div class="row coblos">
                 @foreach($data_kandidat as $item)
                <div class="col-lg">
                    <h4 class="text-center" style="">{{$item->id}}</h4>
                    <img src="{{ asset('/storage/'.$item->image) }}" width="240px" height="220px" alt="..." class="img-thumbnail" id="input" @click="selectVote({{ $item->id }})">
                    <p>{{$item->namakandidat}}</p>
                    <div class="form-check text-center">
                      <input class="form-check-input" type="radio" name="kandidat_id" id="{{ $item->id }}" value="{{ $item->id }}">
                      <label class="form-check-label">
                        Coblos
                      </label>
                    </div>
                </div>
                @endforeach

            </div>
        </div><br>
            <div class="row justify-content-center">
                <div class="col-sm-1">
                    <div id="tampil">
                        @if ($tps->status == 0)
                          <button id="pemilih" onclick="" type="submit" class="btn btn-primary btn-lg">Off</button>
                        @else
                          <button id="pemilih" @click="submitBlockchain" type="submit" class="btn btn-primary btn-lg">Selesai</button>
                        @endif
                    </div>
                </div>
            </div>
            <vue-element-loading :active="show" is-full-screen :color="color" size="150" :text="messages" :text-style="fontStyle"/>
    </div>
    <script type="text/javascript">
        var app = new Vue({
            el: "#app",
            data:{
                tpsId: "{{ $tps->id }}",
                kandidatId: null,
                show:false,
                color: 'blue',
                messages:'Please wait...',
                fontStyle: {
                    fontSize:'20px',
                    fontWeight: 'bold'
                },
            },
            async mounted() {
                let history = await window.vote.methods.suara(1, 1).call();
                let total = await window.web3.utils.hexToNumberString(history._hex);
                // let total = new BN(history._hex).toString();
                console.log(total);

            },
            methods: {
                selectVote: function (voteId) {
                    this.kandidatId = voteId;
                    $("#"+voteId).prop('checked', true);
                },

                submitBlockchain: async function () {
                    this.show = true
                    var self = this;
                    let account = await window.web3.eth.getAccounts();
                    console.log(this.tpsId);
                    console.log(this.kandidatId);

                    let voted = window.vote.methods.vote(this.tpsId,this.kandidatId).send({
                        from: account[0]
                    })
                    setTimeout(async () => {
                        await this.pemilih();
                    }, 6000);
                },

                async pemilih() {
                    fetch("{{ route('status.check.tps.update', $tps->id) }}",{
                        method: "POST",
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            "_token": "{{ csrf_token() }}"
                        }),
                    }).then((res) => {
                        return res.json();
                    }).then(result => {
                        location.reload();
                    });
                }
            },
        })
    Pusher.logToConsole = true;

    var pusher = new Pusher('e4c6c2faac94bee48d8c', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('voted-tps');
    var tpsId = "{{ $tps->id }}";
    channel.bind('voted-'+tpsId, function(data) {
        window.location='';
      console.log(data.tps.status);
      console.log($("#pemilih").length);
      if (data.tps.status == 1) {
        if ($("#pemilih").length > 0) {
          $("#pemilih").remove();
        }
        $("#tampil").append("<button id='pemilih' onclick='pemilih' type='submit' class='btn btn-primary btn-lg'>Selesai</button>");
      } else {
        $("#pemilih").remove();
      }
    });
  </script>

  </body>
</html>
