@extends('layouts.diskominfotik.mainlayout')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <section class="card">
          <header class="card-header">
            Input Data Existing Internet
          </header>
          <div class="card-body">
            <form method="POST" action="{{ url('site/simpan') }}" data-toggle="validator" enctype="multipart/form-data"
              novalidate>
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Site</label>
                <input id="n_site" placeholder="Nama Site" type="text"
                  class="form-control @error('n_site') is-invalid @enderror" name="n_site" value="{{ old('n_site') }}"
                  required autocomplete="n_site">

                @error('n_site')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>


              <label for="exampleInputEmail1">Kecamatan</label>
              <select class="js-example-basic-multiple kecamatan" name="kecamatan_id" id="kecamatan_id">
                <option disabled="true" selected="true" value="0">Pilih Kecamatan</option>
                @foreach ($kecamatan as $data)
                <option value="{{$data->id}}">{{$data->n_kec}}</option>
                @endforeach
              </select>

              <div class="form-group">
                <label for="exampleInputEmail1">Kelurahan/Desa</label>
                <select class="js-example-basic-multiple kelurahan" name="kelurahan_id" id="kelurahan_id">
                  <option disabled="true" selected="true" value="0">Pilih Kelurahan/Desa</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">ISP</label>

                <select class="js-example-basic-multiple @error('provider_id') is-invalid @enderror" name="provider_id">
                  <option disabled="true" selected="true" value="0">Pilih Provider</option>
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
                <label for="exampleInputEmail1">Operator</label>
                <select class="js-example-basic-multiple @error('operator_id') is-invalid @enderror" name="operator_id">
                  <option disabled="true" selected="true" value="0">Pilih Operator</option>
                  @foreach ($operator as $data)
                  <option value="{{$data->id}}">{{$data->n_operator}}</option>
                  @endforeach
                </select>

                @error('operator_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">PIC</label>
                <select class="js-example-basic-multiple @error('pic_id') is-invalid @enderror" name="pic_id">
                  <option disabled="true" selected="true" value="0">Pilih PIC</option>
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
                <label for="exampleInputEmail1">Status Jaringan</label>
                <select class="js-example-basic-multiple @error('s_jaringan') is-invalid @enderror" name="s_jaringan">
                  <option disabled="true" selected="true" value="0">Pilih Jaringan</option>
                  <option value="2G">2G</option>
                  <option value="3G">3G</option>
                  <option value="4G">4G</option>
                </select>

                @error('s_jaringan')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Latitude</label>
                <input id="lat" placeholder="Latitude" type="text"
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
                <input id="long" placeholder="Longitude" type="text"
                  class="form-control @error('long') is-invalid @enderror" name="long" value="{{ old('long') }}"
                  required autocomplete="long">

                @error('long')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Tahun</label>
                <select placeholder="Tahun" class="form-control @error('tahun') is-invalid @enderror" name="tahun"
                  id="tahun">
                  <option disabled="true" selected="true" value="0">Pilih Tahun</option>
                  <option value="2020">2020</option>
                  <option value="2019">2019</option>
                  <option value="2018">2018</option>
                  <option value="2017">2017</option>

                </select>

                @error('tahun')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Keterangan</label>
                <input id="ket" placeholder="Keterangan" type="text"
                  class="form-control @error('ket') is-invalid @enderror" name="ket" value="{{ old('ket') }}" required
                  autocomplete="ket">

                @error('ket')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select placeholder="Status" class="form-control @error('status') is-invalid @enderror" name="status"
                  id="status">
                  <option disabled="true" selected="true" value="0">Pilih Status</option>
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

@section('footer')

<script type="text/javascript">
  $(document).ready(function(){

		$(document).on('change','.kecamatan',function(){
			// console.log("hmm its change");

			var kec_id=$(this).val();
			// console.log(kec_id);
			var div=$(this).parent();

			var op=" ";

			$.ajax({
				type:'get',
				url:'{!!URL::to('site/fetch')!!}',
				data:{'id':kec_id},
				success:function(data){
					// console.log('success');

					// console.log(data[1].n_kel);

					// console.log(data.length);
					op+='<option value="0" selected disabled>Pilih Kelurahan/Desa</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].n_kel+'</option>';
				   }
				   div.find('.kelurahan').html(" ");
				   div.find('.kelurahan').append(op);
				},
				error:function(){

				}
			});
		});

	});
</script>


@endsection