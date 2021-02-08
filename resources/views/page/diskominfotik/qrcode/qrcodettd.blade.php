@extends('layouts.mainlayout2')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">

      <div class="col-lg-4">
        <div class="row">
          <div class="col-lg-12">
            <!--widget start-->
            <section class="card">
              <div class="twt-feed blue-bg">
                <h1>Jonathan Smith</h1>
                <p>jsmith@flatlab.com</p>
                <a href="#">
                  <img src="img/profile-avatar.jpg" alt="">
                </a>
              </div>
              <div class="weather-category twt-category">
                <ul>
                  <li class="active">
                    <h5>320</h5>
                    Tweet
                  </li>
                  <li>
                    <h5>1245</h5>
                    Following
                  </li>
                  <li>
                    <h5>24657</h5>
                    Followers
                  </li>
                </ul>
              </div>
              <div class="twt-write col-sm-12">
                <textarea class="form-control  t-text-area" rows="2" placeholder="Tweet Here"></textarea>
              </div>
              <footer class="twt-footer">
                <button class="btn btn-space btn-white" data-toggle="button">
                  <i class="fa fa-map-marker"></i>
                </button>
                <button class="btn btn-space btn-white" data-toggle="button">
                  <i class="fa fa-camera"></i>
                </button>
                <button class="btn btn-space btn-info pull-right" type="button">
                  <i class="fa fa-twitter"></i>
                  Tweet
                </button>
              </footer>
            </section>
            <!--widget end-->
          </div>
        </div>
      </div>

    </div>


    <!-- page end-->
  </section>
</section>
<!--main content end-->

@endsection