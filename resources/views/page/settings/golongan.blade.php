@extends('layouts.diskominfotik.mainlayout')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    {{-- @if(session('sukses'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fa-check"></i> Alert!</h5>
      Data berhasil di input
    </div>
    @endif --}}
    <!-- page start-->
    <div class="row">
      <div class="col-sm-12">
        <section class="card">
          <header class="card-header">
            Data Pegawai
            <span class="tools pull-right">
              <a class="btn btn-success" data-toggle="modal" href="#myModal">
                Tambah
              </a>
              {{-- <a href="/notadinas/create" class="btn btn-sm btn-outline-success mb-2"><i class="fa fa-plus"
                  aria-hidden="true"></i> Tambah</a> --}}
              {{-- <button type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i>Buat Nota Dinas</button> --}}
              {{-- <a href="javascript:;" class="fa fa-chevron-down"></a>
              <a href="javascript:;" class="fa fa-times"></a> --}}
            </span>
          </header>
          <div class="card-body">
            <div class="adv-table">
              <table class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                  <tr>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Aksi</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($golongan as $data)
                  <tr class="gradeU">
                    <td>{{$data->n_golongan}}</td>
                    @if ($data->status == 1)
                    <td>Aktif</td>
                    @else
                    <td>Non Aktif</td>
                    @endif
                    <td>
                      <a data-toggle="modal" data-target="#update" data-id="{{$data->id}}"
                        data-golongan="{{$data->n_golongan}}" data-status="{{$data->status}}"
                        class="btn btn-warning mb-2 btn-sm"><i class="fa fa-edit"></i></a>

                      <a href="#" type="button" class="btn btn-sm mb-2 btn-danger delete" golongan-id="{{$data->id}}"
                        golongan-nama="{{$data->n_golongan}}"><i class="fa fa-trash-o"></i></a>
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
        <h5 class="modal-title">Tambah Golongan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" method="POST" action="{{ url('golongan/simpan') }}" data-toggle="validator"
          enctype="multipart/form-data" role="form">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Golongan</label>
            <input type="text" name="n_golongan" class="form-control" id="exampleInputEmail3"
              placeholder="Nama Golongan">
          </div>
          <div class="form-group">
            {{-- <label for="exampleInputPassword1">Status</label> --}}
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
        <h5 class="modal-title">Update Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" method="POST" action="{{ url('golongan/update/id') }}" data-toggle="validator"
          enctype="multipart/form-data" role="form">
          @method('patch')
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Golongan</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="text" name="n_golongan" class="form-control" id="jabatan" placeholder="Nama Golongan">
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
      var golongan = button.data('golongan')
      var status = button.data('status')

      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #golongan').val(golongan);
      modal.find('.modal-body #status').val(status);
    })
</script>

<script>
  $('.delete').click(function(){
    var golongan_id = $(this).attr('golongan-id');
    var golongan_nama = $(this).attr('golongan-nama');
    swal({
      title: "Yakin ?",
      text: "Mau di Hapus data dengan nama "+golongan_nama+" ??",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
        window.location = "/golongan/delete/" + golongan_id;
        
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