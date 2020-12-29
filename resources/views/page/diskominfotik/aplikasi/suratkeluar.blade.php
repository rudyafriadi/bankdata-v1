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
            Data Surat Keluar
            <span class="tools pull-right">
              <a class="btn btn-success" data-toggle="modal" href="#myModal">
                Tambah
              </a>
            </span>
          </header>
          <div class="card-body">
            <div class="adv-table">
              <form method="get" action="{{ url('website/cari') }}" data-toggle="validator"
                enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-row align-items-center">
                  <div class="col-auto">
                    <label class="sr-only" for="inlineFormInput">Tahun</label>
                    <input type="date" class="form-control mb-2" name="cari" id="cari">
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
                    <th>No Surat</th>
                    <th>Perihal</th>
                    <th>Tanggal Surat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ($dokumen as $data)
                  <tr class="gradeX">
                    <td>{{$no}}</td>
                    <td>{{$data->no_doc}}</td>
                    <td>{{$data->perihal}}</td>
                    <td>{{$data->tgl_doc}}</td>
                    <td>
                      <a href="/storage/dokumen/masuk/{{$data->doc}}" target="_blank" type="button"
                        class="btn btn-sm mb-2 btn-warning"><i class="fa fa-download"></i></a>
                      <a href="/website/edit/{{$data->id}}" type="button" class="btn btn-sm mb-2 btn-info"><i
                          class="fa fa-edit"></i></a>
                      <a href="#" type="button" class="btn btn-sm mb-2 btn-danger delete" website-id="{{$data->id}}"
                        website-nama="{{$data->nama_web}}"><i class="fa fa-trash-o"></i></a>
                    </td>
                    {{-- <td>{{$data->gambar}}</td> --}}
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
        <h5 class="modal-title">Tambah Surat Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="form" method="POST" action="{{ url('dokumen/simpan') }}" data-toggle="validator"
          enctype="multipart/form-data" role="form">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">No Surat</label>
            <input type="text" name="no_doc" class="form-control" id="exampleInputEmail3" placeholder="Nomor Surat">
            <input type="hidden" value="1" name="kat_doc" class="form-control" id="exampleInputEmail3">
            <input type="hidden" value="2" name="j_doc" class="form-control" id="exampleInputEmail3">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tanggal</label>
            <input type="date" name="tgl_doc" class="form-control" id="exampleInputEmail3"
              placeholder="Tanggal Dokumen">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Perihal</label>
            <input type="text" name="perihal" class="form-control" id="exampleInputEmail3" placeholder="Perihal">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">File</label>
            <input type="file" name="doc" class="form-control" id="exampleInputEmail3" placeholder="File">
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
@endsection

@section('footer')

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