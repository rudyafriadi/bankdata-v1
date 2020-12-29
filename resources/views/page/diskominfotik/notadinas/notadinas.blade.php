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
            Nota Dinas
            <span class="tools pull-right">
              <a href="/notadinas/create" class="btn btn-sm btn-outline-success mb-2"><i class="fa fa-plus"
                  aria-hidden="true"></i> Buat
                Nota Dinas</a>
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
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Perihal</th>
                    <th class="hidden-phone">Kepada</th>
                    <th class="hidden-phone">Dari</th>
                    <th>Sifat</th>
                    {{-- <th>File</th>
                    <th>Lampiran</th> --}}
                    <th>Status</th>
                    <th>Aksi</th>

                  </tr>
                </thead>
                <tbody>
                  <tr class="gradeX">
                    <td>ND-001</td>
                    <td>25-03-2020</td>
                    <td>Permohonan Penerbitan SPT Perjalanan Dinas</td>
                    <td>Kepala Dinas DISKOMINFOTIK</td>
                    <td>Kepala Bidang E-Gov</td>
                    <td>Segera</td>
                    {{-- <td><a href="http://"> lihat </a> </td>
                    <td><a href="http://"> lihat </a></td> --}}
                    <td>Disetujui</td>
                    <td>Periksa | Edit | Delete</td>
                  </tr>

                  <tr class="gradeU">
                    <td>ND-002</td>
                    <td>25-03-2020</td>
                    <td>Permohonan Penerbitan SPT Perjalanan Dinas</td>
                    <td>Kepala Dinas DISKOMINFOTIK</td>
                    <td>Kepala Bidang E-Gov</td>
                    <td>Segera</td>
                    {{-- <td><a href="http://"> lihat </a> </td>
                    <td><a href="http://"> lihat </a></td> --}}
                    <td>Disetujui</td>
                    <td>Periksa | Edit | Delete</td>
                  </tr>
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