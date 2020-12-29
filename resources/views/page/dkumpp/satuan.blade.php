@extends('layouts.dkumpp.mainlayout')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-sm-12">
        <section class="card">
          <header class="card-header">
            Data Satuan
            <span class="tools pull-right">
              <a class="btn btn-success" data-toggle="modal" href="#myModal">
                Tambah
              </a>
            </span>
          </header>
          <div class="card-body">
            <div class="adv-table">
              <table class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                  <tr>
                    <th>Nama Satuan</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($satuan as $data)
                  <tr class="gradeU">
                    <td>{{$data->n_satuan}}</td>
                    <td>{{$data->keterangan}}</td>
                    @if ($data->status == 1)
                    <td>Aktif</td>
                    @else
                    <td>Non Aktif</td>
                    @endif
                    <td>
                      <a data-toggle="modal" data-target="#update" data-id="{{$data->id}}"
                        data-satuan="{{$data->n_satuan}}" data-status="{{$data->status}}"
                        class="btn btn-warning mb-2 btn-sm"><i class="fa fa-edit"></i></a>

                      <a href="#" type="button" class="btn btn-sm mb-2 btn-danger delete" satuan-id="{{$data->id}}"
                        satuan-nama="{{$data->n_satuan}}"><i class=" fa fa-trash-o"></i></a>
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
        <h5 class="modal-title">Tambah Satuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" method="POST" action="{{ url('satuan/simpan') }}" data-toggle="validator"
          enctype="multipart/form-data" role="form">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Satuan</label>
            <input type="text" name="n_satuan" class="form-control" id="exampleInputEmail3" placeholder="Nama Satuan">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="exampleInputEmail3" placeholder="Keterangan">
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
        <h5 class="modal-title">Update Satuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" method="POST" action="{{ url('satuan/update/id') }}" data-toggle="validator"
          enctype="multipart/form-data" role="form">
          @method('patch')
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Jabatan</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="text" name="n_satuan" class="form-control" id="satuan" placeholder="Nama Jabatan">
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
      var satuan = button.data('satuan')
      var status = button.data('status')

      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #satuan').val(satuan);
      modal.find('.modal-body #status').val(status);
    })
</script>

<script>
  $('.delete').click(function(){
    var satuan_id = $(this).attr('satuan-id');
    var satuan_nama = $(this).attr('satuan-nama');
    swal({
      title: "Yakin ?",
      text: "Mau di Hapus data dengan nama "+satuan_nama+" ??",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
        window.location = "/satuan/delete/" + satuan_id;
        
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