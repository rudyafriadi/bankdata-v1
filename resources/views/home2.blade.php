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
              <img src="img/gallery/pns2.png" alt="img04">
              <figcaption>
                <h3>KEPEGAWAIAN</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <a class="fancybox" rel="group" href="/dashboard/diskominfotik">Masuk</a>
              </figcaption>
            </figure>
          </li>
          <li>
            <figure>
              <img src="img/gallery/penduduk.png" alt="img01">
              <figcaption>
                <h3>KEPENDUDUKAN</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <a class="fancybox" rel="group" href="/dashboard/dkumpp">Masuk</a>
              </figcaption>
            </figure>
          </li>
          <li>
            <figure>
              <img src="img/gallery/kominfo.png" alt="img02">
              <figcaption>
                <h3>TEKNOLOGI</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <a class="fancybox" rel="group" href="img/gallery/bkpsdm_logo.png">Take a look</a>
              </figcaption>
            </figure>
          </li>
          <li>
            <figure>
              <img src="img/gallery/media.png" alt="img02">
              <figcaption>
                <h3>Media</h3>
                <span>Kabupaten Kepulauan Anambas</span>
                <a class="fancybox" rel="group" href="img/gallery/bkpsdm_logo.png">Take a look</a>
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