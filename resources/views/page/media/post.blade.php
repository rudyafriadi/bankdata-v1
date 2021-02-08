@extends('layouts.media.mainlayout')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-sm-12">
        <section class="card">
          <header class="card-header">
            Data Media
            <span class="tools pull-right">
              <a class="btn btn-success" data-toggle="modal" href="#myModal">
                Tambah
              </a>
            </span>

          </header>
          <div class="card-body">
            <div class="adv-table">
              <form method="get" action="{{ url('post/cari') }}" data-toggle="validator" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="form-row align-items-center">
                  <div class="col-auto">
                    <label class="sr-only" for="inlineFormInput">Tahun</label>
                    <select name="cari" class="form-control mb-2" id="cari">
                      <option value="all">Semua</option>
                      @foreach ($media as $data)
                      <option value="{{$data->n_instansi}}">{{$data->n_instansi}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-auto">
                    <select name="pilih" class="form-control mb-2" id="">
                      <option value="1">Tampilkan</option>
                      <option value="2">Cetak</option>
                    </select>
                  </div>
                  {{-- <a class="btn btn-warning mb-2" target="_blank" href="website/cari">Cetak</a> --}}
                  <button class="btn btn-warning mb-2" type="submit">Submit
                  </button>
                </div>
              </form>

              <table class="display table table-bordered table-striped" id="dynamic-table">

                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Media</th>
                    <th>Judul</th>
                    <th>Link</th>
                    <th>Tanggal Upload</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ($post as $data)
                  <tr class="gradeX">
                    <td>{{$no}}</td>
                    <td>{{$data->media}}</td>
                    <td>{{$data->judul}}</td>
                    <td><a href="{{$data->link}}">{{$data->link}}</a></td>
                    <td>{{$data->tgl_posting}}</td>
                    @if ($role == 3)
                    <td>
                      <a class="btn btn-sm mb-2 btn-warning" data-target="#editall" data-id="{{$data->id}}"
                        data-media="{{$data->media}}" data-limit="{{$data->tgl_limit}}" data-url="{{$data->url}}"
                        data-keterangan="{{$data->keterangan}}" data-upload="{{$data->tgl_upload}}"
                        data-toggle="modal"><i class="fa fa-edit"></i></a>
                      <a href="#" type="button" class="btn btn-sm mb-2 btn-danger delete" website-id="{{$data->id}}"
                        website-nama="{{$data->judul}}"><i class="fa fa-trash-o"></i></a>
                    </td>
                    @else
                    <td>
                      @if ($data->status == 1)
                      <a class="btn btn-sm mb-2 btn-warning disabled" data-target="#view" data-id="{{$data->id}}"
                        data-url="{{$data->url}}" data-upload="{{$data->tgl_upload}}" data-toggle="modal"><i
                          class="fa fa-eye"></i></a>
                      <a class="btn btn-sm mb-2 btn-success disabled" data-target="#publish" data-id="{{$data->id}}"
                        data-url="{{$data->url}}" data-upload="{{$data->tgl_upload}}" data-toggle="modal">
                        Publish
                      </a>
                      @else
                      <a class="btn btn-sm mb-2 btn-warning" data-target="#view" data-id="{{$data->id}}"
                        data-url="{{$data->url}}" data-upload="{{$data->tgl_upload}}" data-toggle="modal"><i
                          class="fa fa-eye"></i></a>
                      <a class="btn btn-sm mb-2 btn-success" data-target="#publish" data-id="{{$data->id}}"
                        data-url="{{$data->url}}" data-upload="{{$data->tgl_upload}}" data-toggle="modal">
                        Publish
                      </a>
                      @endif
                    </td>
                    @endif



                  </tr>
                  <?php $no++; ?>
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
<!--main content end-->

<!-- Modal Simpan -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Posting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" method="POST" action="{{ url('post/simpan') }}" data-toggle="validator"
          enctype="multipart/form-data" role="form">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Judul</label>
            <input type="text" name="judul" class="form-control" id="exampleInputEmail3" placeholder="Judul Berita">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">link</label>
            <input type="text" name="link" class="form-control" id="exampleInputEmail3" placeholder="Link Berita">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tanggal Posting</label>
            <input type="date" name="tgl_posting" class="form-control" id="exampleInputEmail3"
              placeholder="Tanggal posting berita di Website">
          </div>
          <div class="form-group">
            <input type="hidden" name="status" value="0" class="form-control" id="exampleInputPassword3"
              placeholder="Status">
            <input type="hidden" name="media" value="{{$instansi}}" class="form-control" id="exampleInputPassword3"
              placeholder="Status">
          </div>
          <button type="submit" class="btn btn-default">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal -->

<!-- Modal Publish -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="publish" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Publikasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" method="POST" action="{{ url('publikasi/update/id') }}" data-toggle="validator"
          enctype="multipart/form-data" role="form">
          @method('patch')
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">URL</label>
            <input type="text" name="url" class="form-control" id="url" placeholder="Link Berita">
            <input type="hidden" name="id" id="id" value="">
          </div>
          <div class=" form-group">
            <label for="exampleInputEmail1">Tanggal Upload</label>
            <input type="date" name="tgl_upload" class="form-control" id="upload"
              placeholder="Sesuaikan dengan tanggal upload berita di Website">
            <span>Sesuaikan dengan tanggal upload berita di Website</span>
          </div>
          <button type="submit" class="btn btn-default">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal -->

<!-- Modal view -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="view" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Periksa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" method="POST" action="{{ url('publikasi/update/id') }}" data-toggle="validator"
          enctype="multipart/form-data" role="form">
          @method('patch')
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">URL</label>
            <input type="text" name="url" class="form-control" id="url" placeholder="Link Berita">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="status" value="1">
          </div>
          <div class=" form-group">
            <label for="exampleInputEmail1">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul">
          </div>
          <div class=" form-group">
            <label for="exampleInputEmail1">Tanggal Upload</label>
            <input type="date" name="tgl_upload" class="form-control" id="upload">
          </div>
          <button type="submit" class="btn btn-danger">Kirim</button>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal -->

<!-- Modal view -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editall" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" method="POST" action="{{ url('publikasi/update/id') }}" data-toggle="validator"
          enctype="multipart/form-data" role="form">
          @method('patch')
          @csrf
          <div class=" form-group">
            <label for="exampleInputEmail1">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul">
            <input type="hidden" name="id" id="id">
          </div>
          <div class=" form-group">
            <label for="exampleInputEmail1">Media</label>
            <input type="text" name="media" class="form-control" id="media">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">URL</label>
            <input type="text" name="url" class="form-control" id="url" placeholder="Link Berita">
          </div>
          <div class=" form-group">
            <label for="exampleInputEmail1">Tanggal Upload</label>
            <input type="date" name="tgl_upload" class="form-control" id="upload">
          </div>
          <div class=" form-group">
            <label for="exampleInputEmail1">Batas Upload</label>
            <input type="date" name="tgl_limit" class="form-control" id="limit">
          </div>
          <div class=" form-group">
            <label for="exampleInputEmail1">Status</label>
            <select class="form-control" name="status" id="">
              <option value="0"> On Proses</option>
              <option value="1">Published</option>
              <option value="2">Over Limit</option>
            </select>
          </div>
          <div class=" form-group">
            <label for="exampleInputEmail1">Keterangan</label>
            <input type="text" name="tgl_upload" class="form-control" id="upload">
          </div>
          <button type="submit" class="btn btn-danger">Kirim</button>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal -->

@endsection

@section('footer')

<script>
  $('#publish').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id = button.data('id')
        var url = button.data('url')
        var tgl_upload = button.data('tgl_upload')
  
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #url').val(url);
        modal.find('.modal-body #upload').val(tgl_upload);
      })

      $('#view').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id = button.data('id')
        var url = button.data('url')
        var upload = button.data('upload')
  
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #url').val(url);
        modal.find('.modal-body #upload').val(upload);
      })

      $('#editall').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id = button.data('id')
        var media = button.data('media')
        var judul = button.data('judul')
        var keterangan = button.data('keterangan')
        var upload = button.data('upload')
        var url = button.data('url')
        var upload = button.data('upload')
  
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #url').val(url);
        modal.find('.modal-body #upload').val(upload);
      })
</script>

<script>
  $('.delete').click(function(){
    var website_id = $(this).attr('website-id');
    var website_nama = $(this).attr('website-nama');
    swal({
      title: "Yakin ?",
      text: "Mau di Hapus data dengan nama "+website_nama+" ??",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
        window.location = "/website/delete/" + website_id;
        
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