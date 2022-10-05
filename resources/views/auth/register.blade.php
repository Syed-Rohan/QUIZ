<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/victory/template/demo/vertical-default-light/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Sep 2021 08:06:46 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Registration</title>
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
    <div class="container-fluid page-body-wrapper full-page-wrapper" >
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100" >
          <div class="col-lg-6 mx-auto" >
            <div class="auth-form-light text-left p-5 bg-content" style="box-shadow:0px 0px 10px blue">
              <div class="brand-logo text-center" >
                <img src="{{asset('public/logo.jpg')}}" style="height:100px;width:100px" alt="">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>

              @if (Session::get('success_register'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Registered Successfully!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              <form action="{{ route('registration') }}" class="pt-3" method="post">
                @csrf
                <div class="form-group">
                  <label><strong>User Name</strong></label>
                  <input type="text" class="form-control form-control-lg border-info" name="name" value="{{ old('name') }}" required>
                  @error('name')
                  <span style="color:red"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group">
                    <label><strong>User Email</strong></label>
                  <input type="email" class="form-control form-control-lg border-info" value="{{ old('email') }}" name="email" required>
                  @error('email')
                  <span style="color:red"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group">
                    <label><strong>User Phone</strong></label>
                  <input type="text" class="form-control form-control-lg border-info" value="{{ old('phone') }}" name="phone" required>
                  @error('phone')
                  <span style="color:red"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group">
                    <label><strong>Register As</strong></label>
                    @php
                        $ts = DB::table('teachers')->first();
                    @endphp
                  <select class="form-control form-control-lg border-info" style="color:red" name="user_type" required>
                    <option  value="2" selected>Student</option>
                    @if ($ts->teacher_status==0)
                    <option value="3">Teacher</option>
                    @endif
                  </select>
                  @error('user_type')
                  <span style="color:red"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group">
                  <label><strong>User Password</strong></label><br>
                  <input type="radio" value="Male" name="gender" checked> Male
                  <input type="radio" value="female" class="ml-4" name="gender" > Female
                  @error('password')
                  <span style="color:red"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group">
                    <label><strong>User Password</strong></label>
                  <input type="password" class="form-control form-control-lg border-info" name="password" required>
                  @error('password')
                  <span style="color:red"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                </div>

              </form>
              <div class="text-center mt-4 font-weight-light">
                Already have an account? <a href="{{ url('/login') }}" class="text-primary">Login</a>
              </div>
              <div class="text-center mt-4 font-weight-light text-pink">
                Want to go back to our website ? <a href="{{ url('/') }}" class="text-primary">Back</a>
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


<!-- Mirrored from www.bootstrapdash.com/demo/victory/template/demo/vertical-default-light/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Sep 2021 08:06:46 GMT -->
</html>
