@extends('layouts.app')

@section('content')
<div class="content-wrapper bg-content">
    @if(Auth::user()->user_type==2)
    <div class="row">
      <div class="col-md-6 col-lg-3 grid-margin stretch-card">
        <div class="card bg-owhite">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-md-center">
              <i class="mdi mdi-basket icon-lg text-success"></i>
              <div class="ml-3">
                <p class="mb-0 "><strong><a href="#" class="text-success" style="text-decoration:none;">Enrolled Courses</a></strong></p>
                <h6>1</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 grid-margin stretch-card">
        <div class="card bg-owhite">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-md-center">
              <i class="mdi mdi-rocket icon-lg" style="color:red"></i>
              <div class="ml-3">
                <p class="mb-0"><strong><a href="#" style="text-decoration:none;color:red;">All Courses</a></strong></p>
                <h6>5</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 grid-margin stretch-card">
        <div class="card bg-owhite">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-md-center">
              <i class="mdi mdi-diamond icon-lg text-info"></i>
              <div class="ml-3">
                <p class="mb-0"><strong><a href="#" class="text-info" style="text-decoration:none;">Today's Exam</a></strong></p>
                <h6>1</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 grid-margin stretch-card">
        <div class="card bg-owhite">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-md-center">
              <i class="mdi mdi-chart-line-stacked icon-lg text-pink"></i>
              <div class="ml-3">
                <p class="mb-0"><strong><a href="#" class="text-pink" style="text-decoration:none;">Total Exam</a></strong></p>
                <h6>22</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @elseif(Auth::user()->user_type==3)
      @if(Auth::user()->user_status!='Enable')
      <div class="row">
        <div class="col-md-6 col-lg-8 grid-margin stretch-card m-auto">
          <div class="card bg-danger">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-md-center text-white">
                To active your account please update your personal information and then contact with us . Don't forget to bring cv,certificates,national id card and photo .
              </div>
            </div>
          </div>
        </div>

      </div>
      @else

      @endif
    @endif


  </div>
@endsection
