<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/victory/template/demo/vertical-default-light/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Sep 2021 08:05:14 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('public/auth/vendors/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/auth/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/auth/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('public/auth/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('public/auth/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('public/auth/style.css')}}" type="text/css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <script src="https://use.fontawesome.com/efb4e31c3a.js"></script>
  <link rel="stylesheet" href="{{asset('public/auth/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('public/auth/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('public/auth/images/favicon.png')}}" />

  <script src="https://kit.fontawesome.com/464a8e8d14.js"></script>
  <link rel="stylesheet" href="{{asset('public/auth/vendors/summernote/dist/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{asset('public/auth/vendors/quill/quill.snow.css')}}">
  <link rel="stylesheet" href="{{asset('public/auth/vendors/simplemde/simplemde.min.css')}}">
</head>
<body class="sidebar-dark sidebar-fixed">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-dark">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index-2.html">
          QUIZ
          <!-- <img src="https://www.bootstrapdash.com/demo/victory/template/images/logo.svg" alt="logo"/> -->
        </a>
        <a class="navbar-brand brand-logo-mini" href="index-2.html">
          QUIZ
          <!-- <img src="https://www.bootstrapdash.com/demo/victory/template/images/logo-mini.svg" alt="logo"/> -->
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item dropdown d-none d-lg-flex">
            <a class="nav-link dropdown-toggle nav-btn" id="actionDropdown" href="#" data-toggle="dropdown">
              <span class="btn">+ My Profile</span>
            </a>
            <div class="dropdown-menu navbar-dropdown dropdown-left" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="{{ route('personal_info') }}">
                <i class="icon-user text-primary"></i>
                Personal Info
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <i class="icon-user-following text-danger"></i>
                Change Password
              </a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-lg-flex">
            <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
              <i class="flag-icon flag-icon-gb"></i>
              English
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
              <a class="dropdown-item font-weight-medium" href="#">
                <i class="flag-icon flag-icon-fr"></i>
                French
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item font-weight-medium" href="#">
                <i class="flag-icon flag-icon-es"></i>
                Espanol
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item font-weight-medium" href="#">
                <i class="flag-icon flag-icon-lt"></i>
                Latin
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item font-weight-medium" href="#">
                <i class="flag-icon flag-icon-ae"></i>
                Arabic
              </a>
            </div>
          </li>


        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="mdi mdi-multiplication"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options " id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
            <div class="sidebar-bg-options selected" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles primary"></div>
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles pink"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default"></div>
            </div>
          </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <ul class="nav nav-tabs" id="setting-panel" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
            </li>
          </ul>
          <div class="tab-content" id="setting-content">
            <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
              <div class="add-items d-flex px-3 mb-0">
                <form class="form w-100">
                  <div class="form-group d-flex">
                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                    <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                  </div>
                </form>
              </div>
              <div class="list-wrapper px-3">
                <ul class="d-flex flex-column-reverse todo-list">
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox">
                        Team review meeting at 3.00 PM
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox">
                        Prepare for presentation
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox">
                        Resolve all the low priority tickets due today
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li class="completed">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked>
                        Schedule meeting for next week
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li class="completed">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked>
                        Project review
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                </ul>
              </div>
              <div class="events py-4 border-bottom px-3">
                <div class="wrapper d-flex mb-2">
                  <i class="mdi mdi-circle-outline text-primary mr-2"></i>
                  <span>Feb 11 2018</span>
                </div>
                <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
                <p class="text-gray mb-0">build a js based app</p>
              </div>
              <div class="events pt-4 px-3">
                <div class="wrapper d-flex mb-2">
                  <i class="mdi mdi-circle-outline text-primary mr-2"></i>
                  <span>Feb 7 2018</span>
                </div>
                <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                <p class="text-gray mb-0 ">Call Sarah Graves</p>
              </div>
            </div>
            <!-- To do section tab ends -->
            <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
              <div class="d-flex align-items-center justify-content-between border-bottom">
                <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
              </div>
              <ul class="chat-list">
                <li class="list active">
                  <div class="profile"><img src="../../images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                  <div class="info">
                    <p>Thomas Douglas</p>
                    <p>Available</p>
                  </div>
                  <small class="text-muted my-auto">19 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="../../images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                  <div class="info">
                    <div class="wrapper d-flex">
                      <p>Catherine</p>
                    </div>
                    <p>Away</p>
                  </div>
                  <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                  <small class="text-muted my-auto">23 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="../../images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                  <div class="info">
                    <p>Daniel Russell</p>
                    <p>Available</p>
                  </div>
                  <small class="text-muted my-auto">14 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="../../images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                  <div class="info">
                    <p>James Richardson</p>
                    <p>Away</p>
                  </div>
                  <small class="text-muted my-auto">2 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="../../images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                  <div class="info">
                    <p>Madeline Kennedy</p>
                    <p>Available</p>
                  </div>
                  <small class="text-muted my-auto">5 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="../../images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                  <div class="info">
                    <p>Sarah Graves</p>
                    <p>Available</p>
                  </div>
                  <small class="text-muted my-auto">47 min</small>
                </li>
              </ul>
            </div>
            <!-- chat tab ends -->
          </div>
        </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <div class="nav-link">
                <div class="profile-image">
                  <img src="{{asset(Auth::user()->user_image)}}" alt="image"/>
                  <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
                </div>
                <div class="profile-name">
                  <p class="name">
                    {{Auth::user()->name}}
                  </p>
                  <p class="designation">
                    @if(Auth::user()->user_type=='1')
                        Admin
                    @elseif(Auth::user()->user_type=='2')
                        Student
                    @else
                        Teacher
                    @endif()
                  </p>
                </div>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ url('/home') }}">
                <i class="icon-menu menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            @if(Auth::user()->user_type==2)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('all_courses') }}">
                  <i class="fa fa-book menu-icon"></i>
                  <span class="menu-title">All Courses</span>
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
                <i class="icon-layers menu-icon"></i>
                <span class="menu-title">My Options</span>
              </a>
              <div class="collapse" id="sidebar-layouts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('enrolled_course') }}">Enrolled Courses</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('upcoming_exam') }}">Upcoming Exam</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('todays_exam') }}">Todays Exam</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('all_exam') }}">All Exam</a></li>
                </ul>
              </div>
            </li>
            @elseif(Auth::user()->user_type==1)
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/home') }}">
                  <i class="fa fa-book menu-icon"></i>
                  <span class="menu-title">All Courses</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
                  <i class="icon-layers menu-icon"></i>
                  <span class="menu-title">Teacher</span>
                </a>
                <div class="collapse" id="sidebar-layouts">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add_teacher') }}">Add Teacher</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view_teacher') }}">View Teacher</a></li>
                  </ul>
                </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts1" aria-expanded="false" aria-controls="sidebar-layouts">
                <i class="icon-layers menu-icon"></i>
                <span class="menu-title">Courses</span>
              </a>
              <div class="collapse" id="sidebar-layouts1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('add_course') }}">Add Course</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('view_course') }}">View Course</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('add_batch') }}">Add Batch</a></li>
                  {{-- <li class="nav-item"> <a class="nav-link" href="pages/layout/sidebar-collapsed.html">Add Batch Teacher</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/layout/sidebar-hidden.html">View Course</a></li> --}}
                </ul>
              </div>
            </li>
            @elseif(Auth::user()->user_type==3 && (Auth::user()->user_status=='Requested' || Auth::user()->user_status=='Pending'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('personal_info') }}">
                  <i class="fa fa-book menu-icon"></i>
                  <span class="menu-title">Update Personal Info</span>
                </a>
            </li>

            @elseif(Auth::user()->user_type==3 && Auth::user()->user_status=='Enable')
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts2" aria-expanded="false" aria-controls="sidebar-layouts">
                <i class="icon-layers menu-icon"></i>
                <span class="menu-title">My Options</span>
              </a>
              <div class="collapse" id="sidebar-layouts2">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('my_batches') }}">My Batches</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('create_question') }}">My Questions</a></li>
                  {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('add_batch') }}">My Courses</a></li> --}}
                  {{-- <li class="nav-item"> <a class="nav-link" href="pages/layout/sidebar-collapsed.html">Add Batch Teacher</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/layout/sidebar-hidden.html">View Course</a></li> --}}
                </ul>
              </div>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">
                  <i class="fa fa-power-off menu-icon"></i>
                  <span class="menu-title">Logout</span>
                </a>
            </li>

          </ul>
        </nav>
      <!-- partial -->
      <div class="main-panel">
        @yield('content')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer bg-footer">
            <div class="container-fluid clearfix">
              <span class="d-block text-center text-sm-left d-sm-inline-block">Copyright © {{ now()->year }} <a class="text-pink" href="#"><i class="fa fa-free-code-camp"></i> Spark</a>. All rights reserved.</span>
            </div>
          </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
  <script src="{{asset('public/auth/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('public/auth/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
  <script src="{{asset('public/auth/vendors/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('public/auth/vendors/quill/quill.min.js')}}"></script>
  <script src="{{asset('public/auth/vendors/simplemde/simplemde.min.js')}}"></script>
  <script src="{{asset('public/auth/js/editorDemo.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('public/auth/js/off-canvas.js')}}"></script>
  <script src="{{asset('public/auth/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('public/auth/js/template.js')}}"></script>
  <script src="{{asset('public/auth/js/settings.js')}}"></script>
  <script src="{{asset('public/auth/js/todolist.js')}}"></script>
  <script src="{{asset('public/auth/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('public/auth/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{asset('public/auth/js/data-table.js')}}"></script>
  <script src="{{asset('public/auth/js/modal-demo.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('public/auth/js/dashboard.js')}}"></script>





    <script src="{{asset('public/auth/script.js')}}"></script>
    <script src="{{asset('public/auth/vendors/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/auth/vendors/jquery.avgrund/jquery.avgrund.min.js')}}"></script>
    <script src="{{asset('public/auth/js/alerts.js')}}"></script>
    <script src="{{asset('public/auth/js/avgrund.js')}}"></script>


  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/victory/template/demo/vertical-default-light/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Sep 2021 08:05:41 GMT -->
</html>

