<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bank Data</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="masuk/images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="masuk/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="masuk/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="masuk/fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="masuk/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="masuk/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="masuk/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="masuk/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="masuk/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="masuk/css/util.css">
  <link rel="stylesheet" type="text/css" href="masuk/css/main.css">
  <!--===============================================================================================-->
</head>

<body>

  <div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
      <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST" action="{{ route('signin') }}">
          @csrf
          <span class="login100-form-logo">
            <img style="width: 50px; height: 60px;" src="masuk/images/logo_big.png" alt="">
          </span>

          <span class="login100-form-title p-b-34 p-t-27">
            Anambas Satu Data
          </span>

          <div class="wrap-input100 validate-input" data-validate="Enter username">
            <input class="input100 @error('username') is-invalid @enderror" type="text" name="username"
              placeholder="Username" required>
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
          </div>

          @error('username')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100 @error('password') is-invalid @enderror" type="password" name="password"
              placeholder="Password" required>
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
          </div>

          <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
            <label class="label-checkbox100" for="ckb1">
              Remember me
            </label>
          </div>

          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
              Login
            </button>
          </div>

          <div class="text-center p-t-90">
            <a class="txt1" href="/">
              <- Back to Home </a> </div> </form> </div> </div> </div> <div id="dropDownSelect1">
          </div>

          <!--===============================================================================================-->
          <script src="masuk/vendor/jquery/jquery-3.2.1.min.js"></script>
          <!--===============================================================================================-->
          <script src="masuk/vendor/animsition/js/animsition.min.js"></script>
          <!--===============================================================================================-->
          <script src="masuk/vendor/bootstrap/js/popper.js"></script>
          <script src="masuk/vendor/bootstrap/js/bootstrap.min.js"></script>
          <!--===============================================================================================-->
          <script src="masuk/vendor/select2/select2.min.js"></script>
          <!--===============================================================================================-->
          <script src="masuk/vendor/daterangepicker/moment.min.js"></script>
          <script src="masuk/vendor/daterangepicker/daterangepicker.js"></script>
          <!--===============================================================================================-->
          <script src="masuk/vendor/countdowntime/countdowntime.js"></script>
          <!--===============================================================================================-->
          <script src="masuk/js/main.js"></script>

</body>

</html>