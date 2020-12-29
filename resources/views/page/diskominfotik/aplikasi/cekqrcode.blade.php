@extends('layouts.mainlayout2')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
    <section class="card">
      <header class="card-header">
        @if ($idkadis == 7)
        {{$namakadis}}
        @else
        <p>Salah</p>
        @endif

        <span class="pull-right">

        </span>
      </header>
    </section>
  </section>
</section>
<!--main content end-->
@endsection