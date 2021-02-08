<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Mosaddek">
  <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Anambas Satu Data</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap-reset.css')}}" rel="stylesheet">
  <!--external css-->
  <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap-colorpicker/css/colorpicker.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap-daterangepicker/daterangepicker.css')}}" />


  <!--right slidebar-->
  <link href="{{asset('css/slidebars.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/style2.css')}}" rel="stylesheet">
  <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />

  <!--dynamic table-->
  <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
  <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />

  <!--Form Wizard-->
  <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.steps.css')}}" />

  <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/gallery.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>

<body class="light-sidebar-nav">

  <section id="container" class="">
    @include('layouts.header2')
    {{-- @include('layouts.sidebar') --}}

    @yield('content')

    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        2020 &copy; Dinas Komunikasi Informatika dan Statistik - KKA
        <a href="#" class="go-top">
          <i class="fa fa-angle-up"></i>
        </a>
      </div>

    </footer>
    <!--footer end-->
  </section>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{asset('js/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('js/slidebars.min.js')}}"></script>
  <script src="{{asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/respond.min.js')}}"></script>
  <script src="{{asset('js/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <script src="{{asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>

  <script type="text/javascript" language="javascript"
    src="{{asset('assets/advanced-datatable/media/js/jquery.dataTables.js')}}">
  </script>
  <script type="text/javascript" src="{{asset('assets/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"></script>


  <script type="text/javascript" src="{{asset('assets/data-tables/DT_bootstrap.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/bootstrap-daterangepicker/daterangepicker.js')}}"></script>



  <!--common script for all pages-->
  <script src="{{asset('js/common-scripts.js')}}"></script>

  <!--dynamic table initialization -->
  <script src="{{asset('js/dynamic_table_init.js')}}"></script>

  <!--Form Wizard-->
  <script src="{{asset('js/jquery.steps.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/jquery.validate.min.js')}}" type="text/javascript"></script>

  <!--custom switch-->
  <script src="{{asset('js/bootstrap-switch.js')}}"></script>
  <!--custom tagsinput-->
  <script src="{{asset('js/jquery.tagsinput.js')}}"></script>

  <!--script for this page-->
  <script src="{{asset('js/form-component.js')}}"></script>

  <!--Form Validation-->
  <script src="js/bootstrap-validator.min.js" type="text/javascript"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="assets/fancybox/source/jquery.fancybox.js"></script>

  <script src="js/modernizr.custom.js"></script>
  <script src="js/toucheffects.js"></script>

  @include('sweet::alert')

  @yield('footer')

  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
          (function() {
              'use strict';
              window.addEventListener('load', function() {
                  // Fetch all the forms we want to apply custom Bootstrap validation styles to
                  var forms = document.getElementsByClassName('needs-validation');
                  // Loop over them and prevent submission
                  var validation = Array.prototype.filter.call(forms, function(form) {
                      form.addEventListener('submit', function(event) {
                          if (form.checkValidity() === false) {
                              event.preventDefault();
                              event.stopPropagation();
                          }
                          // form.classList.add('was-validated');
                      }, false);
                  });
              }, false);
          })();
  </script>

  <script type="text/javascript">
    $(function() {
    //    fancybox
      jQuery(".fancybox").fancybox();
  });

  </script>

</body>

</html>