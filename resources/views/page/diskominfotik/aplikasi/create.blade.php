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
            <form method="POST" action="{{ url('website/simpan') }}" data-toggle="validator"
              enctype="multipart/form-data" novalidate>
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Website</label>
                <input id="name" placeholder="Nama Website" type="text"
                  class="form-control @error('nama_web') is-invalid @enderror" name="nama_web"
                  value="{{ old('nama_web') }}" required autocomplete="nama_web">

                @error('nama_web')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Tahun Pembuatan</label>
                <input id="tahun_pembuatan" placeholder="Tahun" type="text"
                  class="form-control @error('tahun_pembuatan') is-invalid @enderror" name="tahun_pembuatan"
                  value="{{ old('tahun_pembuatan') }}" required autocomplete="tahun_pembuatan">

                @error('tahun_pembuatan')
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
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Database</label>
                <select class="js-example-basic-multiple @error('dbase') is-invalid @enderror" name="dbase">
                  <option value="MySQL">MySQL</option>
                  <option value="Oracle">Oracle</option>
                  <option value="PostgreSQL">PostgreSQL</option>
                  <option value="MongoDB">MongoDB</option>
                </select>

                @error('dbase')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Url</label>
                <input id="url" placeholder="Url" type="text" class="form-control @error('url') is-invalid @enderror"
                  name="url" required autocomplete="url">

                @error('url')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select placeholder="Status" class="form-control @error('status') is-invalid @enderror" name="status"
                  id="status">
                  <option value="1">Aktif</option>
                  <option value="0">Tidak Aktif</option>
                </select>

                @error('status')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Gambar</label>
                <input id="gambar" placeholder="Gambar Website" type="file"
                  class="form-control @error('gambar') is-invalid @enderror" name="gambar" required
                  autocomplete="gambar">

                @error('gambar')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <button class="btn btn-primary" type="submit">Simpan</button>
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