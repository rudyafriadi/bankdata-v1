@extends('layouts.mainlayout2')
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
          </header>
          <div class="card-body">
            <div class="adv-table">
              <table class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                  <tr>
                    <th>No Rilis</th>
                    <th>Tentang</th>
                    <th>Media</th>
                    <th>Judul</th>
                    <th>URL</th>
                    <th>Tanggal Upload</th>
                    <th>Batas Upload</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($publikasi as $data)
                  <tr class="gradeX">
                    <td>{{$data->no_rilis}}</td>
                    <td>{{$data->tentang}}</td>
                    <td>{{$data->media}}</td>
                    <td>{{$data->judul}}</td>
                    <td><a href="{{$data->url}}">{{$data->url}}</a></td>
                    <td>{{$data->tgl_upload}}</td>
                    <td>{{$data->tgl_limit}}</td>
                    <td>@if ($data->status == 0)
                      <span class="badge badge-warning">On Proses</span>
                      @elseif ($data->status == 1)
                      <span class="badge badge-success">Published</span>
                      @else
                      Over Limit
                      @endif
                    </td>
                    <td>
                      @if ($data->tgl_upload > $data->tgl_limit)
                      <span class="badge badge-danger"><i class="fa fa-times"></i></span>
                      @elseif ($data->tgl_upload == null)
                      <span class="badge badge-warning"><i class="fa fa-retweet"></i></span>
                      @else
                      <span class="badge badge-success"><i class="fa fa-check"></i></span>
                      @endif
                    </td>
                  </tr>
                  @endforeach

                </tbody>

              </table>
              <span>Keterangan :</span>
              <div>
                <span class="badge badge-danger"><i class="fa fa-times"></i></span> : Melewati batas waktu rilis yang
                ditentukan
              </div>
              <div>
                <span class="badge badge-warning"><i class="fa fa-retweet"></i></span> : Sedang Dalam Proses
              </div>
              <div>
                <span class="badge badge-success"><i class="fa fa-check"></i></span> : Rilis sesuai waktu yang di
                tentukan
              </div>
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