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
            Data Website
            <span class="tools pull-right">
              <a href="/website/create" class="btn btn-sm btn-outline-success mb-2"><i class="fa fa-plus"
                  aria-hidden="true"></i> Tambah
                Data Website</a>
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
                  {{-- <a class="btn btn-warning mb-2" target="_blank" href="website/cari">Cetak</a> --}}
                  <button class="btn btn-warning mb-2" type="submit">Submit
                  </button>
                </div>
              </form>

              <table class="display table table-bordered table-striped" id="dynamic-table">

                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Nama Website</th>
                    <th>Tahun Pembuatan</th>
                    <th>url</th>
                    <th>Status</th>
                    {{-- <th>Gambar</th> --}}
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ($website as $data)
                  <tr class="gradeX">
                    <td>{{$no}}</td>
                    <td>{{$data->nama_web}}</td>
                    <td>{{$data->tahun_pembuatan}}</td>
                    <td>{{$data->url}}</td>
                    <td>@if ($data->status == 1)
                      Aktif
                      @else
                      Tidak Aktif
                      @endif
                    </td>
                    <td>
                      <a href="/website/detail/{{$data->id}}" type="button" class="btn btn-sm mb-2 btn-warning"><i
                          class="fa fa-eye"></i></a>
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