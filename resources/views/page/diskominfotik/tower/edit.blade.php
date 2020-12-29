@extends('layouts.diskominfotik.mainlayout')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <section class="card">
          <header class="card-header">
            Input Data Tower
          </header>
          <div class="card-body">
            <form method="POST" action="/tower/update/{{($tower->id) }}" data-toggle="validator"
              enctype="multipart/form-data" novalidate>
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Site</label>
                <input id="sitename" value="{{$tower->sitename}}" placeholder="Nama Site" type="text"
                  class="form-control @error('sitename') is-invalid @enderror" name="sitename"
                  value="{{ old('sitename') }}" required autocomplete="sitename">

                @error('sitename')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Lokasi Site</label>
                <input id="lokasi" value="{{$tower->lokasi}}" placeholder="Lokasi Site" type="text"
                  class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}"
                  required autocomplete="lokasi">

                @error('lokasi')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Latitude</label>
                <input id="lat" value="{{$tower->lat}}" placeholder="Latitude" type="text"
                  class="form-control @error('lat') is-invalid @enderror" name="lat" value="{{ old('lat') }}" required
                  autocomplete="lat">

                @error('lat')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Longitude</label>
                <input id="long" value="{{$tower->long}}" placeholder="Longitude" type="text"
                  class="form-control @error('long') is-invalid @enderror" name="long" value="{{ old('long') }}"
                  required autocomplete="lokasi">

                @error('long')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Status Pemilik</label>

                <select class="js-example-basic-multiple @error('s_pemilik') is-invalid @enderror" name="s_pemilik">
                  @foreach ($provider as $data)
                  <option value="{{$data->nama_provider}}">{{$data->nama_provider}}</option>
                  @endforeach
                </select>

                @error('s_pemilik')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Status Signal</label>
                <select class="js-example-basic-multiple @error('s_signal') is-invalid @enderror" name="s_signal">
                  <option value="2G">2G</option>
                  <option value="3G">3G</option>
                  <option value="3G">4G</option>
                </select>

                @error('s_signal')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Provider</label>
                <select class="js-example-basic-multiple @error('provider_id') is-invalid @enderror" name="provider_id">
                  @foreach ($provider as $data)
                  <option value="{{$data->id}}">{{$data->nama_provider}}</option>
                  @endforeach
                </select>

                @error('provider_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Info Tower</label>
                <input id="info_tower" value="{{$tower->info_tower}}" placeholder="Info Tower" type="text"
                  class="form-control @error('info_tower') is-invalid @enderror" name="info_tower"
                  value="{{ old('info_tower') }}" required autocomplete="info_tower">

                @error('info_tower')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Program</label>
                <select class="js-example-basic-multiple @error('program_id') is-invalid @enderror" name="program_id">
                  @foreach ($program as $data)
                  <option value="{{$data->id}}">{{$data->n_program}}</option>
                  @endforeach
                </select>

                @error('program_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">PIC</label>
                <select class="js-example-basic-multiple @error('pic_id') is-invalid @enderror" name="pic_id">
                  @foreach ($pic as $data)
                  <option value="{{$data->id}}">{{$data->nama}}</option>
                  @endforeach
                </select>

                @error('pic_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Sumber Power</label>
                <select class="js-example-basic-multiple @error('s_power') is-invalid @enderror" name="s_power">
                  <option value="PLN">PLN</option>
                  <option value="Mesin Genset">Mesin Genset</option>
                </select>

                @error('s_power')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Tahun Pembuatan</label>
                <select placeholder="Tahun" class="form-control @error('tahun') is-invalid @enderror" name="tahun"
                  id="tahun">
                  <option value="2020">2020</option>
                  <option value="2019">2019</option>
                </select>

                @error('tahun')
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
                <input id="gambar" placeholder="Gambar" type="file"
                  class="form-control @error('gambar') is-invalid @enderror" name="gambar" required
                  autocomplete="gambar">
                <p>Gambar :{{$tower->gambar}}</p>
                @error('gambar')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
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