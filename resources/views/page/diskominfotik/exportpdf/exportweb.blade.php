<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <div>
    <center>
      <table>
        <tr>
          <center>
            <td rowspan="5"><img style="height: 150px; width: 120px;" src="{{asset('img/logo_big.png')}}" alt="anambas">
            </td>
          </center>
        </tr>
        <tr>
          <td>
            <center>
              <h4>Pemerintah Kabupaten Kepulauan Anambas</h4>
            </center>
          </td>
        </tr>
        <tr>
          <td>
            <center>
              <h4>Dinas Komunikasi Informatika dan Statistik</h4>
            </center>
          </td>
        </tr>
        <tr>
          <td>
            <center>
              <span>JL. Raja Haji Fisabilillah, Pasor Peti (29791)</span>
            </center>
          </td>
        </tr>
        <tr>
          <td>
            <center>
              <p>Email : diskominfo@anambaskab.go.id</p>
            </center>
          </td>
        </tr>

      </table>
    </center>
  </div>
  <hr style="border-top: 5px solid " ;>
  <table class="table table-striped table-hover">
    <thead>
      <tr style="text-align: center">
        <th>Nama Website</th>
        <th>Tahun Pembuatan</th>
        <th>url</th>
        <th>Bahasa Pemrograman</th>
        <th>Database</th>
        <th>Status</th>
      </tr>
    </thead>
    @foreach ($website as $data)
    <tbody>
      <tr>
        <td>{{$data->nama_web}}</td>
        <td style="text-align: center">{{$data->tahun_pembuatan}}</td>
        <td style="text-align: center">{{$data->url}}</td>
        <td style="text-align: center">{{$data->bhs_pemrograman}}</td>
        <td style="text-align: center">{{$data->dbase}}</td>
        @if ($data->status == 1)
        <td style="text-align: center">Aktif</td>
        @else
        <td style="text-align: center">Tidak Aktif</td>
        @endif
      </tr>
    </tbody>
    @endforeach

  </table>

  <div style="padding-left:800px;">
    <div>
      <center>
        <div>
          <strong>Kepala Dinas Kominfo dan Statistik</strong>
        </div>
      </center>
      <br>
      <center>
        <div>
          <a class="btn btn-info text-light" onclick="javascript:window.print();"><i class="fa fa-print"></i>
            <strong>{{$qrcode }}</strong>
          </a>
        </div>
      </center>
      <br>
      <center>
        <div>
          <p>{{$namakadis}}</p>
        </div>
      </center>
    </div>
</body>

</html>