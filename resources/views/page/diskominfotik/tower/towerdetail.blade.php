@extends('layouts.diskominfotik.mainlayout')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">

      <aside class="profile-nav col-lg-8">

        <section class="card">
          <div class="user-heading">
            <strong>
              <h1> Site {{$tower->sitename}} </h1>
            </strong>
          </div>
          <div class="card-body bio-graph-info">
            <h1>Detail Site</h1>
            <div class="row">
              <div class="bio-row">
                <p><span class="bold">Nama Site </span>: {{$tower->sitename}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Kecamatan </span>: {{$tower->kecamatan->n_kec}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Kelurahan </span>: {{$tower->kelurahan->n_kel}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Latitude </span>: {{$tower->lat}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Longitude</span>: {{$tower->long}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Status Pemilik </span>: {{$tower->s_pemilik}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Status Signal </span>: {{$tower->s_signal}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Provider </span>: {{$tower->provider->nama_provider}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Info Tower</span>: {{$tower->info_tower}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Program </span>: {{$tower->program->n_program}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">PIC </span>: {{$tower->pic->nama}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Sumber Power </span>: {{$tower->s_power}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Tahun</span>: {{$tower->tahun}}</p>
              </div>
              <div class="bio-row">
                @if ($tower->status == 1)
                <p><span class="bold">Status </span>: <span class="badge badge-success">Active</span></p>
                @else
                <p><span class="bold">Status </span>: <span class="badge badge-danger">Tidak Aktif</span></p>
                @endif
              </div>
              <div class="bio-row">
                <p><span class="bold">Gambar</span>: <a class="badge badge-success" data-toggle="modal" href="#gambar">
                    Show
                  </a></p>
              </div>
            </div>
          </div>
        </section>

      </aside>
    </div>

    <!-- page end-->
  </section>
</section>
<!--main content end-->

@endsection

@section('footer')

<!-- Modal -->
<div class="modal fade " id="gambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModal">Site {{$tower->sitename}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <img alt="image" class="modal-body" src="{{asset('storage/img_tower')}}/{{$tower->gambar}}">
    </div>
  </div>
</div>
<!-- modal -->

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