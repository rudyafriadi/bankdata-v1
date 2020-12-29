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
              <a class="btn btn-success" href="/pegawai/create">
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
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Golongan</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Aksi</th>

                  </tr>
                </thead>
                <tbody>
                  @if ($role == 1)
                  @foreach ($pegawai as $data)
                  <tr class="gradeU">
                    <td>{{$data->nip}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->golongan->n_golongan}}</td>
                    <td>{{$data->jabatan->n_jabatan}}</td>
                    @if ($data->status == 1)
                    <td>Aktif</td>
                    @else
                    <td>Non Aktif</td>
                    @endif
                    <td>
                      <a data-toggle="modal" data-target="#update" data-id="{{$data->id}}"
                        data-instansi="{{$data->n_instansi}}" data-alamat="{{$data->alamat}}"
                        data-status="{{$data->status}}" class="btn btn-warning mb-2 btn-sm"><i
                          class="fa fa-edit"></i></a>

                      <a href="#" type="button" class="btn btn-sm mb-2 btn-danger delete" instansi-id="{{$data->id}}"
                        instansi-nama="{{$data->n_instansi}}"><i class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  @foreach ($pegawai_id as $data)
                  <tr class="gradeU">
                    <td>{{$data->nip}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->golongan_id}}</td>
                    <td>{{$data->jabatan_id}}</td>
                    @if ($data->status == 1)
                    <td>Aktif</td>
                    @else
                    <td>Non Aktif</td>
                    @endif
                    <td>
                      <a data-toggle="modal" data-target="#update" data-id="{{$data->id}}"
                        data-instansi="{{$data->n_instansi}}" data-alamat="{{$data->alamat}}"
                        data-status="{{$data->status}}" class="btn btn-warning mb-2 btn-sm disabled"><i
                          class="fa fa-edit"></i></a>

                      <a href="#" type="button" class="btn btn-sm mb-2 btn-danger delete disabled"
                        instansi-id="{{$data->id}}" instansi-nama="{{$data->n_instansi}}"><i
                          class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>
                  @endforeach

                  @endif


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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="needs-validation" method="POST" action="{{ url('pegawai/simpan') }}" data-toggle="validator"
          enctype="multipart/form-data" novalidate>
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror"
              name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input id="password" placeholder="Password" type="password"
                  class="form-control @error('password') is-invalid @enderror" name="password" required
                  autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Confirm Password</label>
                <input type="password" name="n_instansi" class="form-control" id="confirm"
                  placeholder="Confirm Password" required>
                <div class="invalid-feedback">
                  Confirm Password belum diisi
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input type="text" name="n_instansi" class="form-control" id="name" placeholder="Nama" required>
            <div class="invalid-feedback">
              Nama Lengkap belum diisi
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">NIP</label>
            <input type="text" name="n_instansi" class="form-control" id="nip" placeholder="NIP" required>
            <div class="invalid-feedback">
              NIP belum diisi
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Pangkat/Golongan</label>
            <select class="form-control" name="role" id="golongan">
              <option value="1">Admin</option>
              <option value="2">User</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jabatan</label>
            <select class="form-control" name="role" id="jabatan">
              <option value="1">Admin</option>
              <option value="2">User</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Level Pengguna</label>
            <select class="form-control" name="role" id="level">
              <option value="1">Admin</option>
              <option value="2">User</option>
            </select>
          </div>
          <div class="form-group">
            <input type="hidden" name="status" value="1" class="form-control" id="status1" placeholder="Status">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
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
        <h5 class="modal-title">Update Nama OPD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" method="POST" action="{{ url('instansi/update/id') }}" data-toggle="validator"
          enctype="multipart/form-data" role="form">
          @method('patch')
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Nama OPD</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="text" name="n_instansi" class="form-control" id="instansi" placeholder="Nama Golongan">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat OPD">
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
      var instansi = button.data('instansi')
      var alamat = button.data('alamat')
      var status = button.data('status')

      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #instansi').val(instansi);
      modal.find('.modal-body #alamat').val(alamat);
      modal.find('.modal-body #status').val(status);
    })
</script>

<script>
  $('.delete').click(function(){
    var instansi_id = $(this).attr('instansi-id');
    var instansi_nama = $(this).attr('instansi-nama');
    swal({
      title: "Yakin ?",
      text: "Mau di Hapus data dengan nama "+instansi_nama+" ??",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
        window.location = "/instansi/delete/" + instansi_id;
        
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