    <style>
  .container {
    width: 730px;
  }
  .header .logo1 {
    width: 160px;
    height: 110px;
    padding-top: 13px;
    float:left;
  }
  .header .logo2 {
    width: 160px;
    height: 10px;
    padding-top: 0px;
    /*float:right;*/
  }
  .header .title p {
    text-align: center;
    font-size: 16px;
    margin: 2px;
  }
  .header .title h4 {
    text-align: center;
    margin: 10px;
  }
  .line {
    border :3px solid black;
  }
  .line-2 {
    border :2px solid black;
  }
  td {
    font-size: 11px;
  }
</style>
<div class="panel panel-default" id="app">
<div class="container">
  <div class="header" style="width: 730px;
    height: 130px;">
    <div class="logo1">
      {{-- <img src="{{ asset('assets/img/untag.png') }}" width="100px" height="100px" alt=""> --}}
    </div>
      <div class="title" style="padding-right: 170px;">
        <p><b>BADAN EKSEKUTIF MAHASISWA</b></p>
        <p><b>UNIVERSITAS 17 AGUSTUS 1945 SURABAYA</b></p>
        <p>Sekretariat : Gedung Graha Widya Lt. 1</p>
        <p>Jl. Semolowaru No. 45 Surabaya</p>
        <p>Email : bemuntagsby@gmail.com</p>
      </div>

  </div>
  <div class="line"></div>
  <div class="title-kanan" style="text-align: center;">
      <div class="title">
        <p><b>BERITA ACARA</b></p>
        <p><b>HASIL PENGHITUNGAN SUARA</b></p>
        <p><b>PEMILIHAN KETUA BADAN EKSEKUTIF MAHASISWA</b></p>
        <p><b>DI TEMPAT PEMUNGUTAN SUARA</b></p>
      </div>
    </div>
    <div style="text-align: center;">
    <table class="table table-hover" style="padding-left: 160px;" cellpadding="15" border="2">
      <thead>
        <tr>
        <td>Nama Kandidat</td>
            @foreach ($data as $item)
        {{-- <td><p>{{ $item['kandidat_id'] }}</p></td> --}}
        <td><p>{{ $item['namakandidat'] }}</p></td>
        @endforeach
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Total Suara</td>
          <td><p>26</p></td>
          <td><p>21</p></td>
          <td><p>13</p></td>
        </tr>
      </tbody>
    </table>
    </div>
      <div class="title" style="text-align: center;">
        <p>Hasil ini akan menjadi akhir sesuai dengan perhitungan yang dilakukan oleh sistem<br> dan di setujui oleh KPPS</p>
      </div>
      <br><br>
      <div class="title" style="float: right;">
        <p>TTD KPPS</p>
        <br><br><br><br>
        <div style="border: 2px solid black"></div>
        <br>
      </div>
</div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
@section('js')
    <script type="text/javascript">
 var app = new Vue({
     el: "#app",
     data: {
        dataTps: []
     },
     mounted() {
        fetch("/api/list/tps",{
            method: "GET",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        }).then((res) => {
            return res.json();
        }).then(async(result) => {
            let tps = result.data.tps
            let candidates = result.data.candidates
            let datas = []
            console.log(candidates.length);
            console.log(tps.length);

            for (let i = 0; i < candidates.length; i++) {
                const candidate = candidates[i];
                let totalSuara = 0
                for (let index = 0; index < tps.length; index++) {
                    const detailTps = tps[index];

                    let history = await window.vote.methods.suara(detailTps.id, candidate.id).call();
                    let total = await window.web3.utils.hexToNumberString(history._hex);
                    console.log(total);
                    totalSuara += parseInt(total)
                }

                datas.push({
                    name: candidate.namakandidat,
                    y: totalSuara,
                    slice: true,
                })
            }

            this.dataTps = datas
            // Highcharts.chart('container', {
            //     chart: {
            //         plotBackgroundColor: null,
            //         plotBorderWidth: null,
            //         plotShadow: false,
            //         type: 'pie'
            //     },
            //     title: {
            //         text: 'Total Hasil Perhitungan Suara'
            //     },
            //     tooltip: {
            //         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            //     },
            //     plotOptions: {
            //         pie: {
            //             allowPointSelect: true,
            //             cursor: 'pointer',
            //             dataLabels: {
            //                 enabled: true,
            //                 format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            //             }
            //         }
            //     },
            //     series: [{
            //         name: 'Brands',
            //         colorByPoint: true,
            //         data: datas
            //     }]
            // });
        });
     },
 })
</script>
@endsection