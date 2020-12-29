<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <title>Komoditas</title>
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
              <h4>Dinas Koperasi dan Usaha Mikro, Perdagangan dan Perindustrian</h4>
            </center>
          </td>
        </tr>
        <tr>
          <td>
            <center>
              <span>JL. Soekarno Hatta No.1 , Kecamtan Siantan, Desa Tarempa Selatan(29791)</span>
            </center>
          </td>
        </tr>
        <tr>
          <td>
            <center>
              <p>Email : dkumpp@anambaskab.go.id</p>
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
        <th>Nama Barang/Komoditas</th>
        <th>Harga</th>
        <th>Satuan</th>
        <th>Tanggal Update</th>
        <th>Status</th>
      </tr>
    </thead>
    @foreach ($komoditas as $data)
    <tbody>
      <tr style="text-align: center">
        <td>{{$data->barang->n_barang}}</td>
        <td>{{$data->harga}}</td>
        <td>{{$data->satuan->n_satuan}}</td>
        <td>{{$data->created_at}}</td>
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
          <strong>Kepala Dinas Koperasi dan Usaha Mikro, Perdagangan dan Perindustrian</strong>
          <strong>Perdagangan dan Perindustrian</strong>
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