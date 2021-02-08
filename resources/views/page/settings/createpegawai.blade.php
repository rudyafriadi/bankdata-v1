@extends('layouts.diskominfotik.mainlayout')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <section class="card">
          <header class="card-header">
            Data Pengguna
          </header>
          <div class="card-body">
            <form method="POST" action="{{ url('pegawai/simpan') }}" data-toggle="validator"
              enctype="multipart/form-data" novalidate>
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input id="username" placeholder="Username" type="text"
                  class="form-control @error('username') is-invalid @enderror" name="username"
                  value="{{ old('username') }}" required autocomplete="username">

                @error('username')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input id="email" placeholder="Email" type="email"
                  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                  required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input id="password" placeholder="Password" type="password"
                      class="form-control @error('password') is-invalid @enderror" name="password" required
                      autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password-confirm"
                      placeholder="Confirm Password" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Level Pengguna</label>
                <select class="form-control" name="role_id" id="level">
                  @foreach ($roles as $data)
                  <option value="{{$data->id}}">{{$data->n_role}}</option>
                  @endforeach
                </select>
              </div>
          </div>
          <header class="card-header">
            Data Pegawai
          </header>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Lengkap</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                placeholder="Nama Lengkap" required>
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">NIP</label>
              <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip"
                placeholder="NIP" required>
              @error('nip')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Pangkat/Golongan</label>
              <select class="form-control" name="golongan_id" id="golongan">
                @foreach ($golongan as $data)
                <option value="{{$data->id}}">{{$data->n_golongan}}</option>
                @endforeach
              </select>

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Jabatan</label>
              <select class="form-control" name="jabatan_id" id="jabatan">
                @foreach ($jabatan as $data)
                <option value="{{$data->id}}">{{$data->n_jabatan}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Instansi</label>
              <select class="form-control" name="instansi_id" id="jabatan">
                @foreach ($opd as $data)
                <option value="{{$data->id}}">{{$data->n_instansi}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <input type="hidden" name="status" value="1" class="form-control" id="status1" placeholder="Status">
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