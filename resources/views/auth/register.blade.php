<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Mosaddek">
  <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-reset.css" rel="stylesheet">
  <!--external css-->
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />


</head>

<body class="login-body">

  <div class="container">

    <form class="form-signin" method="POST" action="{{ route('register') }}">
      @csrf
      <h2 class="form-signin-heading">registration now</h2>
      <div class="login-wrap">
        {{-- <p>Enter your personal details below</p>
        <input type="text" class="form-control" placeholder="Full Name" autofocus>
        <input type="text" class="form-control" placeholder="Address" autofocus>
        <input type="text" class="form-control" placeholder="Email" autofocus>
        <input type="text" class="form-control" placeholder="City/Town" autofocus>
        <div class="radios">
          <label class="label_radio col-lg-6 col-sm-6" for="radio-01">
            <input name="sample-radio" id="radio-01" value="1" type="radio" checked /> Male
          </label>
          <label class="label_radio col-lg-6 col-sm-6" for="radio-02">
            <input name="sample-radio" id="radio-02" value="1" type="radio" /> Female
          </label>
        </div> --}}
        <input id="name" placeholder="Nama Lengkap" type="text" class="form-control @error('name') is-invalid @enderror"
          name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input type="hidden" value="1" name="role_id">

        <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror"
          name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input id="password" placeholder="Password" type="password"
          class="form-control @error('password') is-invalid @enderror" name="password" required
          autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control"
          name="password_confirmation" required autocomplete="new-password">

        <label class="checkbox">
          <input type="checkbox" value="agree this condition"> I agree to the Terms of Service and Privacy Policy
        </label>
        <button class="btn btn-lg btn-login btn-block" type="submit">Submit</button>

        <div class="registration">
          Already Registered.
          <a class="" href="login.html">
            Login
          </a>
        </div>

      </div>

    </form>

  </div>


</body>

</html>