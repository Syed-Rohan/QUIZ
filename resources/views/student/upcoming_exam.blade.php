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
                      <th>S/N</th>
                      <th>Exam Subject</th>
                      <th>Time</th>
                      <th>Details</th>
                      <th>Question Status</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                  @foreach ($questions as $question)
                  @php
                      $check = DB::table('enrolled_courses')->where('enroll_course_id',$question->course_id)->where('enroll_batch_id',$question->batch_id)->where('enroll_user_id',Auth::user()->id)->first();
                  @endphp
                  @if ($check)


                  @php
                        $i++;

                  @endphp
                  <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $question->subject }}</td>
                      <td>
                        <strong>Date : </strong>{{ $question->exam_date }} <br><br>
                        <strong>Start : </strong>{{ $question->exam_start_time }} <br><br>
                        <strong>Finish : </strong>{{ $question->exam_end_time }} <br><br>
                        <strong>Duration : </strong>{{ $question->exam_duration }} <br><br>
                      </td>
                      <td>
                        <strong>Teacher : </strong>{{ Auth::user()->name }} <br><br>
                        <strong>Course : </strong>{{ $question->course_name.'-'.$question->course_title.'-'.$question->question_level }} <br><br>
                        <strong>Batch : </strong>{{ $question->batch_name }} <br><br>
                        <strong>Type : </strong>@if ($question->question_type==1)
                            <span style="color:red">MCQ</span>
                        @elseif ($question->question_type==2)
                            <span style="color:red">Written</span>
                        @else
                            <span style="color:red">Written & MCQ</span>
                        @endif <br><br>
                        <strong>Mark : </strong>{{ $question->mark }} <br><br>
                        <strong>Minus Mark : </strong>{{ $question->minus_mark }} <br><br>
                      </td>
                      <td style="color:rgb(2, 0, 128)">{{ $question->question_status }}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if (Session::get('success_update'))
  <script >
    window.onload=function(){
      showSwal('success-message','Successfully Updated');
    }
  </script>
  @elseif(Session::get('success_delete'))
  <script >
    window.onload=function(){
      showSwal('success-message','Successfully Deleted');
    }
  </script>
  @endif

@endsection
