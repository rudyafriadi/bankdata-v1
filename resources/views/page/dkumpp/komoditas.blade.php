@extends('layouts.dkumpp.mainlayout')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-sm-12">
        <section class="card">
          <header class="card-header">
            Update Data Komoditas
            <span class="tools pull-right">
              <a class="btn btn-success" data-toggle="modal" href="#myModal">
                Tambah
              </a>
            </span>
          </header>
          <div class="card-body">
            <div class="adv-table">
              <form method="get" action="{{ url('komoditas/cari') }}" data-toggle="validator"
                enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-row align-items-center">
                  <div class="col-auto">
                    <label class="sr-only" for="inlineFormInput">Tahun</label>
                    <select name="cari" class="form-control mb-2" id="cari">
                      <option value="all">Semua</option>
                      @foreach ($barang as $data)
                      <option value="{{$data->id}}">{{$data->n_barang}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-auto">
                    <select name="pilih" class="form-control mb-2" id="">
                      <option value="1">Tampilkan</option>
                      <option value="2">Cetak</option>
                    </select>
                  </div>
                  {{-- <a class="btn btn-warning mb-2" target="_blank" href="tower/cari">Cetak</a> --}}
                  <button class="btn btn-warning mb-2" type="submit">Submit
                  </button>
                </div>
              </form>
              <table class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                  <tr>
                    <th>Nama Barang/Komoditas</th>
                    <th>Harga</th>
                    <th>Merk</th>
                    <th>Satuan</th>
                    <th>Tanggal Update</th>
                    <th>Status</th>
                    <th>Aksi</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($komoditas as $data)
                  <tr class="gradeU">
                    <td>{{$data->barang->n_barang}}</td>
                    <td>{{$data->harga}}</td>
                    <td>{{$data->merk->n_merk}}</td>
                    <td>{{$data->satuan->n_satuan}}</td>
                    <td>{{$data->tanggal}}</td>
                    @if ($data->status == 1)
                    <td>Aktif</td>
                    @else
                    <td>Non Aktif</td>
                    @endif
                    <td>
                      <a data-toggle="modal" data-target="#update" data-id="{{$data->id}}"
                        data-barang="{{$data->barang->n_barang}}" data-merk="{{$data->merk->n_merk}}"
                        data-harga="{{$data->harga}}" data-satuan="{{$data->satuan}}" data-tanggal="{{$data->tanggal}}"
                        data-status="{{$data->status}}" class="btn btn-warning mb-2 btn-sm"><i
                          class="fa fa-edit"></i></a>

                      <a href="#" type="button" class="btn btn-sm mb-2 btn-danger delete" komoditas-id="{{$data->id}}"
                        komoditas-nama="{{$data->barang->n_barang}}"><i class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
    </div>
    <!-- page end-->
  </section>
</section>

<!-- Modal Simpan -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Komoditas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" method="POST" action="{{ url('komoditas/simpan') }}" data-toggle="validator"
          enctype="multipart/form-data" role="form">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Barang</label>
            <select class="form-control" name="barang_id" id="">
              @foreach ($barang as $data)
              <option value="{{$data->id}}">{{$data->n_barang}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Merk</label>
            <select class="form-control" name="merk_id" id="">
              <option value="0">-</option>
              @foreach ($merk as $data)
              <option value="{{$data->id}}">{{$data->n_merk}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Harga</label>
            <input type="text" name="harga" class="form-control" id="exampleInputEmail3" placeholder="Harga">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="exampleInputEmail3" placeholder="Tanggal">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Satuan</label>
            <select class="form-control" name="satuan_id" id="">
              @foreach ($satuan as $data)
              <option value="{{$data->id}}">{{$data->n_satuan}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <input type="hidden" name="status" value="1" class="form-control" id="exampleInputPassword3"
              placeholder="Status">
          </div>
          <button type="submit" class="btn btn-default">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal -->

<!-- Modal Update -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="update" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Data Komoditas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" method="POST" action="{{ url('komoditas/update/id') }}" data-toggle="validator"
          enctype="multipart/form-data" role="form">
          @method('patch')
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Komoditas</label>
            <input type="hidden" name="id" id="id" value="">
            {{-- <select class="form-control" name="barang_id" id="barang">
              @foreach ($barang as $brg)
              <option value="{{$brg->id}}">{{$brg->n_barang}}</option>
            @endforeach
            <input type="text" class="form-control" id="barang" disabled>
            </select> --}}
            <input type="text" class="form-control" id="barang" disabled>

          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Merk</label>
            <select class="form-control" name="merk_id" id="">

              @foreach ($merk as $mrk)
              <option value="{{$mrk->id}}">{{$mrk->n_merk}}</option>
              @endforeach
            </select>
            {{-- <input type="text" class="form-control" id="merk" disabled> --}}
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Harga</label>
            <input class="form-control" type="text" name="harga" id="harga" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Satuan</label>
            <select class="form-control" name="satuan_id" id="satuan">
              {{-- <option value="{{$sat->id}}">{{$sat->n_satuan}}</option> --}}
              @foreach ($satuan as $sat)
              <option value="{{$sat->id}}">{{$sat->n_satuan}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tanggal</label>
            <input class="form-control" type="date" name="tanggal" id="tanggal" value="">
          </div>
          <input type="hidden" name="status" id="status">
          {{-- <div class="form-group">
            <label for="exampleInputPassword1">Status</label>
            <select name="status" id="status" class="form-control">
              <option value="1" selected> Enable</option>
              <option value="0">Disabled</option>
            </select>
          </div> --}}
          <div class="modal-footer justify-content-between">
            <button type="hidden" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
<!--main content end-->
@endsection

@section('footer')
<script>
  $('#update').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('id')
      var barang = button.data('barang')
      var merk = button.data('merk')
      var harga = button.data('harga')
      var satuan = button.data('satuan')
      var tanggal = button.data('tanggal')
      var status = button.data('status')

      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #barang').val(barang);
      modal.find('.modal-body #merk').val(merk);
      modal.find('.modal-body #harga').val(harga);
      modal.find('.modal-body #satuan').val(satuan);
      modal.find('.modal-body #tanggal').val(tanggal);
      modal.find('.modal-body #status').val(status);
    })
</script>

<script>
  $('.delete').click(function(){
    var komoditas_id = $(this).attr('komoditas-id');
    var komoditas_nama = $(this).attr('komoditas-nama');
    swal({
      title: "Yakin ?",
      text: "Mau di Hapus data dengan nama "+komoditas_nama+" ??",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
        window.location = "/komoditas/delete/" + komoditas_id;
        
      } 
      });
  });
</script>

<script>
  @if(Session::has('simpan'))
    toastr.success("{{Session::get('simpan')}}", "Sukses")
  @endif
</script>

<script>
  @if(Session::has('update'))
      toastr.success("{{Session::get('update')}}", "Sukses")
    @endif
</script>

<script>
  @if(Session::has('hapus'))
    toastr.success("{{Session::get('hapus')}}", "Sukses")
  @endif
</script>
@endsection