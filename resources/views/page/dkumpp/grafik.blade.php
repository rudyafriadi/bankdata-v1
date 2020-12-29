@extends('layouts.dkumpp.mainlayout')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <div class="row">

      <div class="col-lg-12">
        <div id="chartAplikasi"></div>
      </div>
    </div>

    </div>
  </section>
</section>
@endsection

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
  Highcharts.chart('chartAplikasi', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Perubahan Harga Komoditas di Kabupaten Kepulauan Anambas'
    },
    subtitle: {
        text: 'Sumber: DKUMPP'
    },
    xAxis: {
        categories: {!! json_encode($categories) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Harga (Rp)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>Rp.{point.y:.1f} /Kg</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [ {
        name: 'beras',
        data: {!! json_encode($beras) !!}
    }, {
        name: 'Gula Pasir',
        data: {!! json_encode($gula) !!}
    }, {
        name: 'Tepung Terigu',
        data: {!! json_encode($tepung) !!}
    }, {
        name: 'Minyak Goreng',
        data: {!! json_encode($minyak) !!}
    }
    ]
});
});
</script>
@endsection