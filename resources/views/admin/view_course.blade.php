@extends('layouts.app')


@section('content')
<div class="content-wrapper">
    <div class="card">
      <div class="card-body">

        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table table-bordered">
                <thead>
                  <tr>
                      <th>Course Name</th>
                      <th>Course Title</th>
                      <th>Course Lavel</th>
                      <th>Course Duration</th>
                      <th>Course Status</th>
                      <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($courses as $course)
                  <tr>
                      <td>{{ $course->course_name }}</td>
                      <td>{{ $course->course_title }}</td>
                      <td>{{ $course->course_level }}</td>
                      <td>{{ $course->course_duration }} Days</td>
                      <td>{{ $course->course_status }}</td>
                      <td>
                        <a onclick="return confirm('Are you sure ? ')" href="{{ route('delete_course',$course->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a><br><br>
                        @if ($course->course_status=='Enable')
                        <a href="{{ route('update_course',[$course->id,'Disable']) }}" class="btn btn-info"><i class="fa fa-times"></i></a>
                        @else
                        <a href="{{ route('update_course',[$course->id,'Enable']) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                        @endif
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
