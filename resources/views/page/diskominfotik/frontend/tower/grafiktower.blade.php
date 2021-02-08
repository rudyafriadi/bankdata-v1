@extends('layouts..mainlayout2')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div id="chartTower"></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div id="tower2"></div>
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
  Highcharts.chart('chartTower', {
    chart: {
        type: 'column',
        width: 1170,
    },
    title: {
        text: 'Grafik Jumlah Tower Per Kecamatan'
    },
    subtitle: {
        text: 'Sumber: asd.anambaskab.go.id'
    },
    xAxis: {
        categories: {!! json_encode($kec) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: '(Unit)'
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
        name: 'Tower',
        data: {!! json_encode($datakec) !!}

    }]
});
});
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    Highcharts.chart('tower2', {
      chart: {
          type: 'column',
          width: 1170,
      },
      title: {
          text: 'Grafik Jumlah Tower Per Tahun'
      },
      subtitle: {
          text: 'Sumber: asd.anambaskab.go.id'
      },
      xAxis: {
          categories: {!! json_encode($categories) !!},
          crosshair: true
      },
      yAxis: {
          min: 0,
          title: {
              text: '(Unit)'
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
          name: 'Tower',
          data: {!! json_encode($data) !!}
  
      }]
  });
  });
</script>
@endsection