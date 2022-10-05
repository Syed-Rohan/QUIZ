<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('public/auth/vendors/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/auth/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/auth/vendors/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/auth/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('public/auth/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('public/auth/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('public/auth/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('public/auth/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5" style="box-shadow:0px 0px 10px blue">
              <div class="brand-logo text-center" >
                <img src="{{asset('public/logo.jpg')}}" style="height:100px;width:100px" alt="">
              </div>
              <h4 class="text-center">Hello! let's get started.</h4>
              <h6 class="font-weight-light text-center">Sign in to continue.</h6>
              <form class="pt-3" action="login" method="post">
                @csrf
                <div class="form-group">
                  <label for=""><strong>Enter Email</strong></label>
                  <input type="email" class="form-control form-control-lg border-primary" name="email">
                  @error('email')
                  <span style="color:red"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for=""><strong>Enter Password</strong></label>
                  <input type="password" class="form-control form-control-lg  border-primary" name="password">
                  @error('password')
                  <span style="color:red"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >SIGN IN</button>
                </div>
              </form>
              <div class="text-center mt-4 font-weight-light">
                Don't have an account? <a href="{{ url('/register') }}" class="text-primary">Create</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('public/authvendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('public/authjs/off-canvas.js')}}"></script>
  <script src="{{asset('public/authjs/hoverable-collapse.js')}}"></script>
  <script src="{{asset('public/authjs/template.js')}}"></script>
  <script src="{{asset('public/authjs/settings.js')}}"></script>
  <script src="{{asset('public/authjs/todolist.js')}}"></script>
  <!-- endinject -->
</body>


</html>
