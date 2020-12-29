@extends('layouts.diskominfotik.mainlayout')
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
        text: 'Grafik Jumlah Aplikasi Per Tahun'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: {!! json_encode($categories) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (Unit)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Unit</b></td></tr>',
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
        name: 'Aplikasi',
        data: {!! json_encode($data) !!}

    }]
});
});
</script>
@endsection