@extends('layouts.app')


@section('content')
<div class="content-wrapper">
    <div class="card col-lg-8 col-sm-12 m-auto">
        <div class="card-header">
            <h4 class="text-center"> Add Courses</h4>
        </div>

      <div class="card-body">

        <div class="row">
          <div class="col-lg-12">
            @if(Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfully Added</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <form action="{{ route('add_course_insert') }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-6 col-sm-12">
                        <label for="">Course Name</label>
                        <input type="text" name="course_name" class="form-control border-success" required>
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                        <label for="">Course Title</label>
                        <input type="text" name="course_title" class="form-control border-success" required>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12">
                        <label for="">Course Duration ( Days )</label>
                        <input type="number" min="10" value="10" name="course_duration" class="form-control border-success" required>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12">
                        <label for="">Course Fee ( BDT )</label>
                        <input type="number" min="1" value="1000" name="course_fee" class="form-control border-success" required>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12">
                        <label for="">Course Level</label>
                        <select name="course_level" class="form-control border-success" required>
                            <option value="SSC">SSC</option>
                            <option value="HSC">HSC</option>
                            <option value="University" selected>University</option>
                            <option value="Job">Job</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-12 col-sm-12">
                        <label for="">Course Details</label>
                        <textarea class="form-control" name="course_details" rows="8"></textarea>
                    </div>
                    <div class="form-group col-lg-12 col-sm-12">
                        <button type="submit" class="btn btn-success form-control">ADD COURSE</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
