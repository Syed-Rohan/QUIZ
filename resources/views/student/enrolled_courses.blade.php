@extends('layouts.app')

@section('content')
<div class="content-wrapper bg-content">
    <div class="row">
      @foreach ($courses as $course)
      @php
        $check = DB::table('enrolled_courses')->where('enroll_course_id',$course->id)->where('enroll_user_id',Auth::user()->id)->first();
      @endphp
      @if ($check)
      <div class="col-md-6 col-lg-4 grid-margin stretch-card " >
        <div class="card bg-owhite" style="border:5px solid pink">
          <div class="card-body">
            <div class="d-flex">
                <i class="fa fa-hand-peace-o icon-lg text-success"></i>
              <div class="ml-3">
                <p class="mb-0 "><strong>Course Name : <a href="#" class="text-danger" style="text-decoration:none;">{{ $course->course_name }}</a></strong></p>
                <p class="mb-0 "><strong>Course Title : <a href="#" class="text-danger" style="text-decoration:none;">{{ $course->course_title }}</a></strong></p>
                <p class="mb-0 "><strong>Course Level : <a href="#" class="text-danger" style="text-decoration:none;">{{ $course->course_level }}</a></strong></p>
                <a href="{{ route('course_details',$course->id) }}" class="btn btn-sm btn-outline-primary form-control mt-1">Details</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach

    </div>



  </div>
@endsection
