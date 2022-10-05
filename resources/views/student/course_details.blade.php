@extends('layouts.app')


@section('content')
<div class="content-wrapper bg-content">
    <div class="card col-lg-8 col-sm-12 m-auto bg-owhite">
        <div class="card-header">
            <h4 class="text-center">{{$course->course_name}}-{{$course->course_title}}</h4>
        </div>

      <div class="card-body">
        @if (Session::get('success'))


        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>You have successfully enrolled this course</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
          <div class="col-lg-6 text-center">
            <h5 style="font-weight: 1000">Details</h5>
            {{$course->course_details}}
          </div>
          @php
              $batches = DB::table('batches')->where('course_id',$course->id)->where('batch_status','Enable')->where('batch_delete',0)->get();
          @endphp

          <div class="col-lg-6 text-center">
            <h5 style="font-weight: 1000">Batch / Schedule</h5>

            @if ($batches->count()>0)
            <strong class="text-pink">Fee : </strong>{{$course->course_fee}} BDT <br>
                @foreach ($batches as $batch)
                    {{$batch->batch_name."-".$batch->batch_number}} <br>
                    Start : {{$batch->batch_start}}<br>
                    Time : {{$batch->batch_schedule}}<br>
                    <hr>
                @endforeach
                @php
                    $check = DB::table('enrolled_courses')->where('enroll_course_id',$course->id)->where('enroll_user_id',Auth::user()->id)->first();
                @endphp
                @if ($check)
                <button type="button" class="btn btn-outline-danger">Already Enrolled</button>
                @else
                <form action="{{ url('/pay') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Select Batch</label>
                        <select name="batch_id" id="" class="form-control">
                            @foreach ($batches as $batch)
                            <option value="{{$batch->id}}">{{$batch->batch_number}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="enroll_fee" value="{{$course->course_fee}}">
                        <input type="hidden" name="enroll_course_id" value="{{$course->id}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-danger">Enroll Now</button>
                    </div>
                </form>
                @endif

            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
