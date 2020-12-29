@extends('layouts.diskominfotik.mainlayout')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!--state overview start-->
    <div class="row state-overview">
      <div class="col-lg-3 col-sm-6">
        <section class="card">
          <div class="symbol terques">
            <i class="fa fa-user"></i>
          </div>
          <div class="value">
            <h1 class="count">
              0
            </h1>
            <p>New Users</p>
          </div>
        </section>
      </div>
      <div class="col-lg-3 col-sm-6">
        <section class="card">
          <div class="symbol red">
            <i class="fa fa-tags"></i>
          </div>
          <div class="value">
            <h1 class=" count2">
              0
            </h1>
            <p>Sales</p>
          </div>
        </section>
      </div>
      <div class="col-lg-3 col-sm-6">
        <section class="card">
          <div class="symbol yellow">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <div class="value">
            <h1 class=" count3">
              0
            </h1>
            <p>New Order</p>
          </div>
        </section>
      </div>
      <div class="col-lg-3 col-sm-6">
        <section class="card">
          <div class="symbol blue">
            <i class="fa fa-bar-chart-o"></i>
          </div>
          <div class="value">
            <h1 class=" count4">
              0
            </h1>
            <p>Total Profit</p>
          </div>
        </section>
      </div>
    </div>
    <!--state overview end-->

    <div class="row">
      <div class="col-lg-12">
        <!--custom chart start-->
        <div class="border-head">
          <h3>Earning Graph</h3>
        </div>
        <div class="custom-bar-chart">
          <ul class="y-axis">
            <li><span>100</span></li>
            <li><span>80</span></li>
            <li><span>60</span></li>
            <li><span>40</span></li>
            <li><span>20</span></li>
            <li><span>0</span></li>
          </ul>
          <div class="bar">
            <div class="title">JAN</div>
            <div class="value tooltips" data-original-title="80%" data-toggle="tooltip" data-placement="top">80%</div>
          </div>
          <div class="bar ">
            <div class="title">FEB</div>
            <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
          </div>
          <div class="bar ">
            <div class="title">MAR</div>
            <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
          </div>
          <div class="bar ">
            <div class="title">APR</div>
            <div class="value tooltips" data-original-title="55%" data-toggle="tooltip" data-placement="top">55%</div>
          </div>
          <div class="bar">
            <div class="title">MAY</div>
            <div class="value tooltips" data-original-title="20%" data-toggle="tooltip" data-placement="top">20%</div>
          </div>
          <div class="bar ">
            <div class="title">JUN</div>
            <div class="value tooltips" data-original-title="39%" data-toggle="tooltip" data-placement="top">39%</div>
          </div>
          <div class="bar">
            <div class="title">JUL</div>
            <div class="value tooltips" data-original-title="75%" data-toggle="tooltip" data-placement="top">75%</div>
          </div>
          <div class="bar ">
            <div class="title">AUG</div>
            <div class="value tooltips" data-original-title="45%" data-toggle="tooltip" data-placement="top">45%</div>
          </div>
          <div class="bar ">
            <div class="title">SEP</div>
            <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
          </div>
          <div class="bar ">
            <div class="title">OCT</div>
            <div class="value tooltips" data-original-title="42%" data-toggle="tooltip" data-placement="top">42%</div>
          </div>
          <div class="bar ">
            <div class="title">NOV</div>
            <div class="value tooltips" data-original-title="60%" data-toggle="tooltip" data-placement="top">60%</div>
          </div>
          <div class="bar ">
            <div class="title">DEC</div>
            <div class="value tooltips" data-original-title="90%" data-toggle="tooltip" data-placement="top">90%</div>
          </div>
        </div>
        <!--custom chart end-->
      </div>

    </div>

  </section>
</section>
<!--main content end-->
@endsection