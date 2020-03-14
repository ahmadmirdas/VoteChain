@extends('adminlte::page')

@section('title', 'Evoting')

@section('content')
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ Session::get('success') }}
</div>
@endif
<div class="panel panel-default" id="app">
  <div class="">
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
      {{session('sukses')}}
    </div>
    @endif
    <div class="modal-body">
      <div class="col-6">
        <h1>Total Hasil Perhitungan Suara</h1>
      </div>

      <table class="table table-hover">
        <tr>
          <th>Nama Kandidat </th>
          @foreach ($data as $item)
          <th>{{ $item['namakandidat'] }}</th>
          {{-- {{ dd($item) }} --}}
          @endforeach
          {{-- <th>Kandidat 1</th>
          <th>Kandidat 2</th>
          <th>Kandidat 3</th> --}}
        </tr>
        <tr>
            <td>Suara</td>
            <td v-for="tps in dataTps">@{{ tps.y }}</td>
        </tr>
    </table>
  </div>
</div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

@endsection
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
            Highcharts.chart('container', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Total Hasil Perhitungan Suara'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: datas
                }]
            });
        });
     },
 })
</script>
@endsection
