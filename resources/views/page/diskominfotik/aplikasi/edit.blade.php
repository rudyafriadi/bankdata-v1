@extends('layouts.diskominfotik.mainlayout')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <section class="card">
          <header class="card-header">
            Input Data Website
          </header>
          <div class="card-body">
            <form method="POST" action="/website/update/{{($website->id) }}" data-toggle="validator"
              enctype="multipart/form-data" novalidate>
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Website</label>
                <input id="name" value="{{$website->nama_web}}" type="text"
                  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                  required autocomplete="name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Tahun Pembuatan</label>
                <input id="tahun" value="{{$website->tahun_pembuatan}}" type="text"
                  class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}"
                  required autocomplete="tahun">

                @error('tahun')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Bahasa Pemrograman</label>
                <select class="js-example-basic-multiple @error('bhs_pemrograman') is-invalid @enderror"
                  name="bhs_pemrograman">
                  <option value="PHP NATIVE">PHP NATIVE</option>
                  <option value="LARAVEL">LARAVEL</option>
                  <option value="CODEIGNITER">CODEIGNITER</option>
                  <option value="JAVASCRIPT">JAVASCRIPT</option>
                  <option value="CSS">CSS</option>
                </select>

                @error('bhs_pemrograman')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span>Bahasa Pemrograman: {{ $website->bhs_pemrograman}} </span>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Database</label>
                <select class="js-example-basic-multiple @error('dbase') is-invalid @enderror" name="dbase">
                  <option value="MySQL" selected>MySQL</option>
                  <option value="Oracle">Oracle</option>
                  <option value="PostgreSQL">PostgreSQL</option>
                  <option value="MongoDB">MongoDB</option>
                </select>

                @error('dbase')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span>Database: {{ $website->dbase}} </span>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Url</label>
                <input id="url" value="{{$website->url}}" type="text"
                  class="form-control @error('url') is-invalid @enderror" name="url" required autocomplete="url">

                @error('url')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select value="{{$website->status}}" class="form-control @error('status') is-invalid @enderror"
                  name="status" id="status">
                  <option value="1">Aktif</option>
                  <option value="0">Tidak Aktif</option>
                </select>

                @error('status')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                @if ($website->status == 1)
                <span>Status: Aktif </span>
                @else
                <span>Status: Tidak Aktif </span>
                @endif

              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Gambar</label>
                <input id="gambar" type="file" value="{{$website->gambar}}" class="form-control" name="gambar" required
                  autocomplete="gambar">
                <p>Gambar :{{$website->gambar}}</p>
              </div>
              <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
          </div>
        </section>
      </div>
    </div>
    </div>
    </div>
  </section>
</section>

@endsection