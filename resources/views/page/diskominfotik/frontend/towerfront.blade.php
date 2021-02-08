@extends('layouts.mainlayout2')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <aside class="profile-nav alt green-border">
          <section class="card">
            <div class="user-heading alt red-bg">
              <center>
                <h1>KOMUNIKASI</h1>
              </center>
            </div>


          </section>
        </aside>
      </div>
      <div class="col-lg-4">
        <!--widget start-->
        <aside class="profile-nav alt green-border">
          <section class="card">
            <div class="user-heading alt green-bg">
              <h1>TOWER</h1>
            </div>

            <ul class="nav nav-pills nav-stacked">
              <li class="nav-item"><a class="nav-link" href="/datatower"> <i class="fa fa-book"></i> Data Tower
                  <span class="badge badge-primary pull-right r-activity">19</span></a></li>
              <li class="nav-item"><a class="nav-link" href="/grafiktower"> <i class="fa fa-bar-chart-o"></i> Grafik
                </a>
              </li>
              <li class="nav-item"><a class="nav-link" href="javascript:;"> <i class="fa fa-picture-o"></i> Info
                  Grafis</a></li>
            </ul>

          </section>
        </aside>
        <!--widget end-->

      </div>
      <div class="col-lg-4">
        <!--widget start-->
        <aside class="profile-nav alt green-border">
          <section class="card">
            <div class="user-heading alt green-bg">
              <h1>APLIKASI & WEBSITE</h1>
            </div>

            <ul class="nav nav-pills nav-stacked">
              <li class="nav-item"><a class="nav-link" href="/dataaplikasi"> <i class="fa fa-book"></i> Data Aplikasi
                  & Website
                  <span class="badge badge-primary pull-right r-activity">19</span></a></li>
              <li class="nav-item"><a class="nav-link" href="grafikaplikasi"> <i class="fa fa-bar-chart-o"></i> Grafik
                </a></li>
              <li class="nav-item"><a class="nav-link" href="javascript:;"> <i class="fa fa-picture-o"></i> Info
                  Grafis</a></li>
            </ul>

          </section>
        </aside>
        <!--widget end-->

      </div>
      <div class="col-lg-4">
        <!--widget start-->
        <aside class="profile-nav alt green-border">
          <section class="card">
            <div class="user-heading alt green-bg">
              <h1>TITIK INTERNET</h1>
            </div>

            <ul class="nav nav-pills nav-stacked">
              <li class="nav-item"><a class="nav-link" href="javascript:;"> <i class="fa fa-book"></i> Data Lokasi
                  Titik Internet
                  <span class="badge badge-primary pull-right r-activity">19</span></a></li>
              <li class="nav-item"><a class="nav-link" href="javascript:;"> <i class="fa fa-bar-chart-o"></i> Grafik
                </a></li>
              <li class="nav-item"><a class="nav-link" href="javascript:;"> <i class="fa fa-picture-o"></i> Info
                  Grafis
                </a></li>
            </ul>

          </section>
        </aside>
        <!--widget end-->

      </div>

    </div>
    <!-- page end-->
  </section>
</section>
<!--main content end-->


@endsection