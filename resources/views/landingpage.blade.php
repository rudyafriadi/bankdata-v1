<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Mosaddek">
  <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Coming Soon </title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-reset.css" rel="stylesheet">
  <!--external css-->
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

  <!-- coming soon styles -->
  <link href="css/soon.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

</head>

<body class="cs-bg">
  <!-- START HEADER -->
  <section id="header">
    <div class="container">
      <header>
        <!-- HEADLINE -->
        <a class="logo floatless " href="index.html">Bank<span>Data</span></a>
        <h2 class="mt-3"> Selamat Datang di Halaman Dashboard </h2>
        @if ($id == 1 && $role == 2 || $id == 1 && $role == 1)
        <h2> Dinas Komunikasi Informatika dan Statistik</h2>
        @elseif ($id == 2 && $role == 2 || $id == 2 && $role == 1)
        <h2> BKPSDM </h2>
        @elseif ($id ==3 && $role == 2 || $id == 3 && $role == 1)
        <h2> DKUMPP </h2>
        @elseif ($id ==4 && $role == 2 || $id == 4 && $role == 1)
        <h2> MEDIA </h2>
        @else
        <h2>Super Admin</h2>
        @endif
        <br />
      </header>
      <!-- START TIMER -->
      <div id="timer" data-animated="FadeIn">
        @if ($id == 1 && $role == 2 || $id == 1 && $role == 1)
        <a class="btn btn-danger" rel="group" href="/dashboard/diskominfotik">Masuk</a>
        @elseif ($id == 2 && $role == 2 ||$id == 2 && $role == 1)
        <a class="btn btn-danger" rel="group" href="/dashboard/bkpsdm">Masuk</a>
        @elseif ($id == 3 && $role == 2 || $id == 3 && $role == 1)
        <a class="btn btn-danger" rel="group" href="/dashboard/dkumpp">Masuk</a>
        @elseif ($id == 4 && $role == 2 || $id == 4 && $role == 1)
        <a class="btn btn-danger" rel="group" href="/dashboard/media">Masuk</a>
        @else
        <a class="btn btn-danger" rel="group" href="/dashboard/diskominfotik">DISKOMINFOTIK</a>
        <a class="btn btn-danger" rel="group" href="/dashboard/bkpsdm">BKPSDM</a>
        <a class="btn btn-danger" rel="group" href="/dashboard/dkumpp">DKUMPP</a>
        <a class="btn btn-danger" rel="group" href="/dashboard/media">MEDIA</a>
        @endif

      </div>
      <!-- END TIMER -->

    </div>
  </section>
  <!-- END HEADER -->


  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/soon/plugins.js"></script>
  <script src="js/soon/custom.js"></script>

</body>
<!-- END BODY -->

</html>