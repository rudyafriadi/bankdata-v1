@extends('layouts.diskominfotik.mainlayout')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
    <section class="card">
      {{-- <header class="card-header">
        Projects Details
        <span class="pull-right">
          <button type="button" id="loading-btn" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i>
            Refresh</button>
        </span>
      </header> --}}
    </section>
    <div class="row">
      <div class="col-md-12">
        <section class="card">
          <div class="bio-graph-heading project-heading">
            <strong> {{$website->nama_web}} </strong>
          </div>
          <div class="card-body bio-graph-info">
            <!--<h1>New Dashboard BS3 </h1>-->
            <div class="row p-details">
              <div class="bio-row">
                <p><span class="bold">Developer </span>: DINAS KOMUNIKASI INFORMATIKA DAN STATISTIK</p>
              </div>
              <div class="bio-row">
                @if ($website->status == 1)
                <p><span class="bold">Status </span>: <span class="badge badge-primary">Active</span></p>
                @else
                <p><span class="bold">Status </span>: <span class="badge badge-danger">Tidak Aktif</span></p>
                @endif

              </div>
              <div class="bio-row">
                <p><span class="bold">Create </span>: {{$website->tahun_pembuatan}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Last Updated</span>: {{$website->updated_at}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Bahasa </span>: {{$website->bhs_pemrograman}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Database </span>: {{$website->dbase}}</p>
              </div>
              <div class="bio-row">
                <p><span class="bold">Version </span>: v.2.3</p>
              </div>

              <div class="col-lg-12">
                {{-- <div class="bio-row">
                  <p><span class="bold">Tampilan </span>:
                    <span class="p-team">
                      <a href="#"><img alt="image" class="" src="{{asset('storage/img_website/1.jpg')}}"></a>
                </span>
                </p>
              </div> --}}
              <dl class="dl-horizontal mtop20 p-progress">
                <dt>Tampilan Website:</dt>
                <dd>
                  <div class="progress">

                    <a href="#"><img width="1200px" alt="image" class=""
                        src="{{asset('storage/img_website')}}/{{$website->gambar}}"></a>
                  </div>
                  <small>Project completed in <strong>75%</strong>. Remaining close the project, sign a contract and
                    invoice.</small>
                </dd>
              </dl>
            </div>
          </div>

      </div>

  </section>

  {{-- <section class="card">
          <header class="card-header">
            Last Activity
          </header>
          <div class="card-body">
            <table class="table table-hover p-table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Commnets</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    Project analysis
                  </td>
                  <td>
                    18/11/2014 9:28:23
                  </td>
                  <td>
                    28/11/2014 12:23:03
                  </td>
                  <td>
                    Ipsum is that it has a as opposed to using Lorem Ipsum is that it has a as opposed to using
                  </td>
                  <td>
                    <span class="badge badge-info">Completed</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    Requirement Collection
                  </td>
                  <td>
                    10/11/2014 9:28:23
                  </td>
                  <td>
                    22/11/2014 12:23:03
                  </td>
                  <td>
                    Tawseef Ipsum is that it has a as opposed to using Lorem Ipsum is that it has a as opposed to using
                  </td>
                  <td>
                    <span class="badge badge-info">Reported</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    Design Implement
                  </td>
                  <td>
                    18/11/2014 9:28:23
                  </td>
                  <td>
                    28/11/2014 12:23:03
                  </td>
                  <td>
                    Dism Ipsum is that it has a as opposed to using Lorem Ipsum is that it has a as opposed to using
                  </td>
                  <td>
                    <span class="badge badge-info">Accepted</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    Widget Management
                  </td>
                  <td>
                    18/11/2014 9:28:23
                  </td>
                  <td>
                    28/11/2014 12:23:03
                  </td>
                  <td>
                    Cosm Ipsum is that it has a as opposed to using Lorem Ipsum is that it has a as opposed to using
                  </td>
                  <td>
                    <span class="badge badge-info">Completed</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    Contact Info
                  </td>
                  <td>
                    18/11/2014 9:28:23
                  </td>
                  <td>
                    28/11/2014 12:23:03
                  </td>
                  <td>
                    Hello that it has a as opposed to using Lorem Ipsum is that it has a as opposed to using
                  </td>
                  <td>
                    <span class="badge badge-info">Sent</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    Project analysis
                  </td>
                  <td>
                    18/11/2014 9:28:23
                  </td>
                  <td>
                    28/11/2014 12:23:03
                  </td>
                  <td>
                    Ipsum is that it has a as opposed to using Lorem Ipsum is that it has a as opposed to using
                  </td>
                  <td>
                    <span class="badge badge-info">Completed</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    Project analysis
                  </td>
                  <td>
                    18/11/2014 9:28:23
                  </td>
                  <td>
                    28/11/2014 12:23:03
                  </td>
                  <td>
                    Orem psum is that it has a as opposed to using Lorem Ipsum is that it has a as opposed to using
                  </td>
                  <td>
                    <span class="badge badge-info">Completed</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </section> --}}

  </div>
  {{-- <div class="col-md-4">
        <section class="card">
          <header class="card-header">
            Deskripsi
          </header>

          <div class="card-body">
            <a href="#"><img src="img/email-img/vector-lab.jpg" alt="" /></a>

            <p>
              Sometimes the simplest things are the hardest to find. I imagined a line of my favorite pieces, the things
              i would live in every day, all year round. So I stopped looking and started designing. Sometimes the
              simplest things are the hardest to find. Sometimes the simplest things are the hardest to find. I imagined
              a line of my favorite pieces, the things i would live in every day, all year round. So I stopped looking
              and started designing. Sometimes the simplest things are the hardest to find.
            </p>
            <br />
            <h6 class="bold">Priority</h6>
            <ul class="nav nav-pills nav-stacked labels-info ">
              <li><i class=" fa fa-circle text-danger"></i> High Priority</p>
              </li>
            </ul>

            <br />
            <h6 class="bold">Project files</h6>
            <ul class="list-unstyled p-files">
              <li><a href=""><i class="fa fa-file-text"></i> Project-document.docx</a></li>
              <li><a href=""><i class="fa fa-picture-o"></i> Logo-company.jpg</a></li>
              <li><a href=""><i class="fa fa-mail-forward"></i> Email-from-flatbal.mln</a></li>
              <li><a href=""><i class="fa fa-file"></i> Contract-10_12_2014.docx</a></li>
            </ul>
            <br />

            <h6 class="bold">Project Tags</h6>
            <ul class="p-tag-list">
              <li><a href=""><i class="fa fa-tag"></i> Dlor</a></li>
              <li><a href=""><i class="fa fa-tag"></i> Lorem ipsum</a></li>
              <li><a href=""><i class="fa fa-tag"></i> Google</a></li>
              <li><a href=""><i class="fa fa-tag"></i> Excellent</a></li>
              <li><a href=""><i class="fa fa-tag"></i> Dlor</a></li>
              <li><a href=""><i class="fa fa-tag"></i> Lorem ipsum</a></li>
              <li><a href=""><i class="fa fa-tag"></i> Google</a></li>
              <li><a href=""><i class="fa fa-tag"></i> Excellent</a></li>
            </ul>

            <div class="text-center mtop20">
              <a href="#" class="btn btn-sm btn-primary">Add files</a>
              <a href="#" class="btn btn-sm btn-warning">Report contact</a>
            </div>
          </div>

        </section>
      </div> --}}
  </div>
  <!-- page end-->
</section>
</section>
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