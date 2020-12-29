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
            Data Existing Site Internet
            <span class="tools pull-right">
              <a href="/site/create" class="btn btn-sm btn-outline-success mb-2"><i class="fa fa-plus"
                  aria-hidden="true"></i> Tambah
              </a>
            </span>
          </header>
          <div class="card-body">
            <div class="adv-table">
              <form method="get" action="{{ url('site/cari') }}" data-toggle="validator" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="form-row align-items-center">
                  <div class="col-auto">
                    <label class="sr-only" for="inlineFormInput">Tahun</label>
                    <select name="cari" class="form-control mb-2" id="cari">
                      <option value="all">Semua</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
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
                    <th>Nomor</th>
                    <th>Nama Site</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan/Desa</th>
                    <th>ISP</th>
                    <th>Tahun Pembuatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ($site as $data)
                  <tr class="gradeX">
                    <td>{{$no}}</td>
                    <td>{{$data->n_site}}</td>
                    <td>{{$data->kecamatan->n_kec}}</td>
                    <td>{{$data->kelurahan->n_kel}}</td>
                    <td>{{$data->provider->nama_provider}}</td>
                    <td>{{$data->tahun}}</td>
                    <td>@if ($data->status == 1)
                      Aktif
                      @else
                      Tidak Aktif
                      @endif
                    </td>
                    <td>
                      <a href="/tower/detail/{{$data->id}}" type="button" class="btn btn-sm mb-2 btn-warning"><i
                          class="fa fa-eye"></i></a>
                      <a href="/tower/edit/{{$data->id}}" type="button" class="btn btn-sm mb-2 btn-info"><i
                          class="fa fa-edit"></i></a>
                      <a href="#" type="button" class="btn btn-sm mb-2 btn-danger delete" tower-id="{{$data->id}}"
                        tower-nama="{{$data->sitename}}"><i class="fa fa-trash-o"></i></a>
                    </td>
                    {{-- <td>{{$data->gambar}}</td> --}}
                  </tr>
                  <?php $no++; ?>
                  @endforeach

                </tbody>
                {{-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th class="hidden-phone">Engine version</th>
                    <th class="hidden-phone">CSS grade</th>
                  </tr>
                </tfoot> --}}
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
@endsection

@section('footer')

<script>
  $('.delete').click(function(){
    var tower_id = $(this).attr('tower-id');
    var tower_nama = $(this).attr('tower-nama');
    swal({
      title: "Yakin ?",
      text: "Mau di Hapus data dengan nama "+tower_nama+" ??",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
        window.location = "/tower/delete/" + tower_id;
        
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