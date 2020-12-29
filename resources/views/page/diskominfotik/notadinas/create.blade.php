@extends('layouts.diskominfotik.mainlayout')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <!--progress bar start-->
        <section class="card">
          <header class="card-header">
            BUAT NOTA DINAS
          </header>
          <div class="card-body">
            <form id="wizard-validation-form" action="#">
              <div>
                <h3>Step 1</h3>
                <section>
                  <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="userName">User name </label>
                    <div class="col-lg-10">
                      <input class="form-control" id="userName" name="userName" type="text" class="required">

                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="password"> Password *</label>
                    <div class="col-lg-10">
                      <input id="password" name="password" type="text" class="required form-control">

                    </div>
                  </div>

                  <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="confirm">Confirm Password *</label>
                    <div class="col-lg-10">
                      <input id="confirm" name="confirm" type="text" class="required form-control">
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <label class="col-lg-12 control-label ">(*) Mandatory</label>
                  </div>
                </section>
                <h3>Step 2</h3>
                <section>

                  <div class="form-group clearfix">
                    <label class="col-lg-2 control-label" for="name"> First name *</label>
                    <div class="col-lg-10">
                      <input id="name" name="name" type="text" class="required form-control">
                    </div>
                  </div>
                  <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="surname"> Last name *</label>
                    <div class="col-lg-10">
                      <input id="surname" name="surname" type="text" class="required form-control">

                    </div>
                  </div>

                  <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="email">Email *</label>
                    <div class="col-lg-10">
                      <input id="email" name="email" type="text" class="required email form-control">
                    </div>
                  </div>

                  <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="address">Address </label>
                    <div class="col-lg-10">
                      <input id="address" name="address" type="text" class="form-control">
                    </div>
                  </div>

                  <div class="form-group clearfix">
                    <label class="col-lg-12 control-label ">(*) Mandatory</label>
                  </div>

                </section>
                <h3>Step 3</h3>
                <section>
                  <div class="form-group clearfix">
                    <div class="col-lg-12">
                      <ul class="list-unstyled w-list">
                        <li>First Name : Mosaddek </li>
                        <li>Last Name : Hossain </li>
                        <li>Emial: dkmosa@gmail.com</li>
                        <li>Address: 123 Dream City, Dreamland. </li>
                      </ul>
                    </div>
                  </div>
                </section>
                <h3>Step Final</h3>
                <section>
                  <div class="form-group clearfix">
                    <div class="col-lg-12">
                      <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                      <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                    </div>
                  </div>

                </section>
              </div>
            </form>
          </div>
        </section>


      </div>


    </div>
    <!-- page end-->
  </section>
</section>
<!--main content end-->
@endsection

@section('footer')
<script>
  //step wizard

    $(function() {
        $('#default').stepy({
            backLabel: 'Previous',
            block: true,
            nextLabel: 'Next',
            titleClick: true,
            titleTarget: '.stepy-tab'
        });
    });
</script>

<script type="text/javascript">
  $(document).ready(function () {
        var form = $("#wizard-validation-form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            }
        });
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function (event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                alert("Submitted!");
            }
        }).validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
    });


</script>

@endsection