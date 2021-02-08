@extends('layouts.mainlayout2')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <section class="card">
      {{-- <header class="card-header">
        Image Galley
      </header> --}}
      <div class="card-body">
        <ul class="grid cs-style-3">
          <li>
            <figure>
              <img src="img/gallery/penduduk.png" alt="img01">
              <figcaption>
                <h3>KEPENDUDUKAN</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <button style="bottom: 20px; right: 20px; position:absolute" type="button" id="pesan2">Masuk</button>
                {{-- <button class="fancybox" rel="group" id="pesan" href="#">Masuk</button> --}}
              </figcaption>
            </figure>
          </li>
          <li>
            <figure>
              <img src="img/gallery/pns2.png" alt="img04">
              <figcaption>
                <h3>PEMERINTAHAN</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <button style="bottom: 20px; right: 20px; position:absolute" type="button" id="pesan1">Masuk</button>
              </figcaption>
            </figure>
          </li>
          <li>
            <figure>
              <img src="img/gallery/pendidikan.png" alt="img04">
              <figcaption>
                <h3>PENDIDIKAN</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <button style="bottom: 20px; right: 20px; position:absolute" type="button" id="pesan1">Masuk</button>
              </figcaption>
            </figure>
          </li>
          <li>
            <figure>
              <img src="img/gallery/kesehatan2.png" alt="img04">
              <figcaption>
                <h3>KESEHATAN</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <button style="bottom: 20px; right: 20px; position:absolute" type="button" id="pesan1">Masuk</button>
              </figcaption>
            </figure>
          </li>

          <li>
            <figure>
              <img src="img/gallery/kominfo.png" alt="img02">
              <figcaption>
                <h3>KOMUNIKASI</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <a href="/komunikasi" style="bottom: 20px; right: 20px; position:absolute">Masuk</a>
                {{-- <a class="fancybox" rel="group" href="img/gallery/bkpsdm_logo.png">Masuk</a> --}}
              </figcaption>
            </figure>
          </li>

          <li>
            <figure>
              <img src="img/gallery/media.png" alt="img02">
              <figcaption>
                <h3>MEDIA</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <a href="/media" style="bottom: 20px; right: 20px; position:absolute">Masuk</a>
                {{-- <a class="fancybox" rel="group" href="img/gallery/bkpsdm_logo.png">Masuk</a> --}}
              </figcaption>
            </figure>
          </li>

          <li>
            <figure>
              <img src="img/gallery/pns2.png" alt="img04">
              <figcaption>
                <h3>PERDAGANGAN, PERINDUSTRIAN, KOPERASI & UKM</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <button style="bottom: 20px; right: 20px; position:absolute" type="button" id="pesan1">Masuk</button>
              </figcaption>
            </figure>
          </li>
          <li>
            <figure>
              <img src="img/gallery/pns2.png" alt="img04">
              <figcaption>
                <h3>PERIKANAN, PERTANIAN & PANGAN</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <button style="bottom: 20px; right: 20px; position:absolute" type="button" id="pesan1">Masuk</button>
              </figcaption>
            </figure>
          </li>
          <li>
            <figure>
              <img src="img/gallery/pns2.png" alt="img04">
              <figcaption>
                <h3>PARIWISATA</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <button style="bottom: 20px; right: 20px; position:absolute" type="button" id="pesan1">Masuk</button>
              </figcaption>
            </figure>
          </li>
          <li>
            <figure>
              <img src="img/gallery/pns2.png" alt="img04">
              <figcaption>
                <h3>PEKERJAAN UMUM, PENATAAN RUANG, PERUMAHAN & PEMUKIMAN RAKYAT</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <button style="bottom: 20px; right: 20px; position:absolute" type="button" id="pesan1">Masuk</button>
              </figcaption>
            </figure>
          </li>
          <li>
            <figure>
              <img src="img/gallery/pns2.png" alt="img04">
              <figcaption>
                <h3>SOSIAL POLITIK & KETERTIBAN UMUM</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <button style="bottom: 20px; right: 20px; position:absolute" type="button" id="pesan1">Masuk</button>
              </figcaption>
            </figure>
          </li>
          <li>
            <figure>
              <img src="img/gallery/pns2.png" alt="img04">
              <figcaption>
                <h3>KETENAGAKERJAAN DAN KEIMIGRASIAN</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <button style="bottom: 20px; right: 20px; position:absolute" type="button" id="pesan1">Masuk</button>
              </figcaption>
            </figure>
          </li>
        </ul>

      </div>
    </section>

    <!-- page end-->
  </section>
</section>
<!--main content end-->

@endsection

@section('footer')
<script>
  $('#pesan1').click(function () {
    toastr.success("Saat ini Data Belum Bisa di Tampilkan", "ANAMBAS SATU DATA")
  });
  $('#pesan2').click(function () {
    toastr.success("Saat ini Data Belum Bisa di Tampilkan", "ANAMBAS SATU DATA")
  });
  $('#pesan3').click(function () {
    toastr.success("Saat ini Data Belum Bisa di Tampilkan", "ANAMBAS SATU DATA")
  });
  $('#pesan4').click(function () {
    toastr.success("Saat ini Data Belum Bisa di Tampilkan", "ANAMBAS SATU DATA")
  });
</script>
@endsection