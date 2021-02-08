@extends('layouts.mainlayout2')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-sm-12">
        <section class="card">
          <header class="card-header">
            Data Tower
          </header>
          <div class="card-body">
            <div class="adv-table">
              <table class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Nama Aplikasi/Website</th>
                    <th>Bahasa Pemrograman</th>
                    <th>Database</th>
                    <th>Tahun Pembuatan</th>
                    <th>Url</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ($website as $data)
                  <tr class="gradeX">
                    <td>{{$no}}</td>
                    <td>{{$data->nama_web}}</td>
                    <td>{{$data->bhs_pemrograman}}</td>
                    <td>{{$data->dbase}}</td>
                    <td>{{$data->tahun_pembuatan}}</td>
                    <td> <a href="{{$data->url}}">{{$data->url}}</a> </td>
                  </tr>
                  <?php $no++; ?>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
      {{-- <div class="col-sm-12">
        <section class="card">
          <header class="card-header">
            Jumlah Tower di Setiap Kecamatan
          </header>
          <div class="card-body">
            <div class="adv-table">
              <table class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                  <tr>
                    <th>Kecamatan</th>
                    <th>Jumlah Tower</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($towerkec as $data)
                  <tr>
                    <td>{{$data->n_kec}}</td>
      <td>{{$data->tower_count}}</td>
      </tr>
      @endforeach
      </tbody>
      </table>
    </div>
    </div>
  </section>
  </div>
  <div class="col-sm-12">
    <section class="card">
      <header class="card-header">
        Jumlah Provider Setiap Kecamatan
      </header>
      <div class="card-body">
        <div class="table-responsive">
          <table class="display table table-bordered table-striped" id="dynamic-table">
            <thead>
              <tr>
                <th rowspan="2">Nomor</th>
                <th rowspan="2">Kecamatan</th>
                <th colspan="4">Jumlah Provider</th>
                <th rowspan="2">Total</th>
              <tr>
                <th>Tekomsel</th>
                <th>Indosat</th>
                <th>XL Axiata</th>
                <th>Smartfren</th>
              </tr>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Siantan</td>
                <td>{{$telkomsel1}}</td>
                <td>{{$indosat1}}</td>
                <td>{{$xl1}}</td>
                <td>{{$smartfren1}}</td>
                <td>{{$total1}}</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Jemaja</td>
                <td>{{$telkomsel2}}</td>
                <td>{{$indosat2}}</td>
                <td>{{$xl2}}</td>
                <td>{{$smartfren2}}</td>
                <td>{{$total2}}</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Palmatak</td>
                <td>{{$telkomsel3}}</td>
                <td>{{$indosat3}}</td>
                <td>{{$xl3}}</td>
                <td>{{$smartfren3}}</td>
                <td>{{$total3}}</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Siantan Timur</td>
                <td>{{$telkomsel4}}</td>
                <td>{{$indosat4}}</td>
                <td>{{$xl4}}</td>
                <td>{{$smartfren4}}</td>
                <td>{{$total4}}</td>
              </tr>
              <tr>
                <td>5</td>
                <td>Siantan Tengah</td>
                <td>{{$telkomsel5}}</td>
                <td>{{$indosat5}}</td>
                <td>{{$xl5}}</td>
                <td>{{$smartfren5}}</td>
                <td>{{$total5}}</td>
              </tr>
              <tr>
                <td>6</td>
                <td>Siantan Selatan</td>
                <td>{{$telkomsel6}}</td>
                <td>{{$indosat6}}</td>
                <td>{{$xl6}}</td>
                <td>{{$smartfren6}}</td>
                <td>{{$total6}}</td>
              </tr>
              <tr>
                <td>7</td>
                <td>Jemaja Barat</td>
                <td>{{$telkomsel7}}</td>
                <td>{{$indosat7}}</td>
                <td>{{$xl7}}</td>
                <td>{{$smartfren7}}</td>
                <td>{{$total7}}</td>
              </tr>
              <tr>
                <td>8</td>
                <td>Jemaja Timur</td>
                <td>{{$telkomsel8}}</td>
                <td>{{$indosat8}}</td>
                <td>{{$xl8}}</td>
                <td>{{$smartfren8}}</td>
                <td>{{$total8}}</td>
              </tr>
              <tr>
                <td>9</td>
                <td>Kute Siantan</td>
                <td>{{$telkomsel9}}</td>
                <td>{{$indosat9}}</td>
                <td>{{$xl9}}</td>
                <td>{{$smartfren9}}</td>
                <td>{{$total9}}</td>
              </tr>
              <tr>
                <td>10</td>
                <td>Siantan Utara</td>
                <td>{{$telkomsel10}}</td>
                <td>{{$indosat10}}</td>
                <td>{{$xl10}}</td>
                <td>{{$smartfren10}}</td>
                <td>{{$total10}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div> --}}

  </div>
  <!-- page end-->
</section>
</section>
<!--main content end-->
@endsection