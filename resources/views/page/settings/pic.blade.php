@extends('layouts.diskominfotik.mainlayout')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-sm-12">
        <section class="card">
          <header class="card-header">
            Data PIC
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
                    <th>Nama </th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Status</th>
                    <th>Aksi</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($pic as $data)
                  <tr class="gradeU">
                    <td>{{$data->nama}}</td>
                    <td>{{$data->alamat}}</td>
                    <td>{{$data->no_hp}}</td>
                    @if ($data->status == 1)
                    <td>Aktif</td>
                    @else
                    <td>Non Aktif</td>
                    @endif
                    <td>
                      <a data-toggle="modal" data-target="#update" data-id="{{$data->id}}" data-nama="{{$data->nama}}"
                        data-alamat="{{$data->alamat}}" data-no_hp="{{$data->no_hp}}" data-status="{{$data->status}}"
                        class="btn btn-warning mb-2 btn-sm"><i class="fa fa-edit"></i></a>

                      <a href="#" type="button" class="btn btn-sm mb-2 btn-danger delete" data-id="{{$data->id}}"
                        data-nama="{{$data->nama}}" data-alamat="{{$data->alamat}}" data-nohp="{{$data->no_hp}}"><i
                          class="fa fa-trash-o"></i></a>
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
        <h5 class="modal-title">Tambah PIC</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" method="POST" action="{{ url('pic/simpan') }}" data-toggle="validator"
          enctype="multipart/form-data" role="form">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputEmail3" placeholder="Nama">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="exampleInputEmail3" placeholder="Alamat">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">No HP</label>
            <input type="text" name="no_hp" class="form-control" id="exampleInputEmail3" placeholder="No HP">
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
        <h5 class="modal-title">Update PIC</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" method="POST" action="{{ url('pic/update/id') }}" data-toggle="validator"
          enctype="multipart/form-data" role="form">
          @method('patch')
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Nama </label>
            <input type="hidden" name="id" id="id" value="">
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat </label>
            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="ALamat">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">No HP </label>
            <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No HP">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Status </label>
            <select class="form-control" name="status" id="status">
              <option value="0">Non Aktif</option>
              <option value="1">Aktif</option>
            </select>
            {{-- <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No HP"> --}}
          </div>
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
      var nama = button.data('nama')
      var alamat = button.data('alamat')
      var no_hp = button.data('no_hp')
      var status = button.data('status')

      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #nama').val(nama)
      modal.find('.modal-body #alamat').val(alamat);
      modal.find('.modal-body #no_hp').val(no_hp);
      modal.find('.modal-body #status').val(status);
    })
</script>

<script>
  $('.delete').click(function(){
    var pic_id = $(this).attr('data-id');
    var pic_nama = $(this).attr('data-nama');
    var pic_alamat = $(this).attr('data-alamat');
    var pic_nohp = $(this).attr('data-nohp');
    var pic_status = $(this).attr('data-status');

    swal({
      title: "Yakin ?",
      text: "Mau di Hapus data dengan nama "+pic_nama+" ??",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
        window.location = "/pic/delete/" + pic_id;
        
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