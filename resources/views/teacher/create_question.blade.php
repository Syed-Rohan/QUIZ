@extends('layouts.app')


@section('content')

<div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        <div class="modal fade" id="example-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add New Question</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="{{ route('create_question') }}">
                    @csrf
                    <div class="row">
                          <div class="form-group col-6">
                            <label for="recipient-name" class="col-form-label"><strong>Question Subject</strong></label>
                            <input type="text" class="form-control border-info" name="question_subject" required>
                          </div>
                          <div class="form-group col-6">
                            <label for="recipient-name" class="col-form-label"><strong>Question Type</strong></label>
                            <select  class="form-control border-info"  name="question_type" required>
                              <option value="1">Only MCQ</option>
                              <option value="2">Only Written</option>
                              <option value="3">Written & MCQ</option>
                            </select>
                        </div>
                          <div class="form-group col-12">
                              <label for="recipient-name" class="col-form-label"><strong>Select Batch</strong></label>
                              <select  class="form-control border-info"  name="batch_id" required>
                                @php
                                    $courses = DB::table('batches')->join('courses','batches.course_id','=','courses.id')->select('batches.*','courses.course_title','courses.course_name','courses.course_level')->where('batch_teacher',Auth::user()->id)->get();
                                @endphp
                                @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->course_name.'-'.$course->course_title.'-'.$course->course_level.'-'.$course->batch_name.'-'.$course->batch_number}}</option>
                                @endforeach
                              </select>
                          </div>
                          <div class="form-group col-6">
                            <label for="recipient-name" class="col-form-label"><strong>Mark</strong></label>
                            <input type="text" class="form-control border-info" name="mark" required>
                          </div>
                          <div class="form-group col-6">
                            <label for="recipient-name" class="col-form-label"><strong>Minus Mark</strong></label>
                            <input type="text" class="form-control border-info" name="minus_mark" required>
                          </div>
                          <div class="form-group col-6">
                            <label for="recipient-name" class="col-form-label"><strong>Exam Duration</strong></label>
                            <input type="text" class="form-control border-info" name="exam_duration" required>
                          </div>
                          <div class="form-group col-6">
                            <label for="recipient-name" class="col-form-label"><strong>Exam Date</strong></label>
                            <input type="date" class="form-control border-info" name="exam_date" required>
                          </div>
                          <div class="form-group col-6">
                            <label for="recipient-name" class="col-form-label"><strong>Exam Start Time</strong></label>
                            <input type="time" class="form-control border-info" name="exam_start_time" required>
                          </div>
                          <div class="form-group col-6">
                            <label for="recipient-name" class="col-form-label"><strong>Exam End Time</strong></label>
                            <input type="time" class="form-control border-info" name="exam_end_time" required>
                          </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success form-control">ADD</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        <h4 class="card-title">Questions
            <button class="btn btn-outline-info" data-toggle="modal" data-target="#example-4" data-backdrop="static" data-keyboard="false">Add</button>
        </h4>
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
                      <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                  @foreach ($questions as $question)
                  @php
                      $today = date("Y-m-d");
                      if($today>$question->exam_date){
                        DB::table('questions')->where('id',$question->id)->update([
                        'question_status' => 'Taken'
                        ]);
                      }
                  @endphp
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
                      <td class="text-center">

                        <div class="modal fade" id="example-{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog" >
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Update Question - {{ $i }}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form method="post" action="{{ route('update_question') }}">
                                    @csrf
                                    <div class="row">
                                          <div class="form-group col-6">
                                            <label for="recipient-name" class="col-form-label"><strong>Question Subject</strong></label>
                                            <input type="text" class="form-control border-info" name="question_subject" value="{{ $question->subject }}" required>
                                            <input type="hidden" class="form-control border-info" name="question_id" value="{{ $question->id }}" required>
                                          </div>
                                          <div class="form-group col-6">
                                            <label for="recipient-name" class="col-form-label"><strong>Question Type</strong></label>
                                            <select  class="form-control border-info"  name="question_type" required>
                                              <option value="1" @if($question->question_type==1) Selected @endif>Only MCQ</option>
                                              <option value="2" @if($question->question_type==2) Selected @endif>Only Written</option>
                                              <option value="3" @if($question->question_type==3) Selected @endif>Written & MCQ</option>
                                            </select>
                                        </div>
                                          <div class="form-group col-12">
                                              <label for="recipient-name" class="col-form-label"><strong>Select Batch</strong></label>
                                              <select  class="form-control border-info"  name="batch_id" required>
                                                @php
                                                    $courses = DB::table('batches')->join('courses','batches.course_id','=','courses.id')->select('batches.*','courses.course_title','courses.course_name','courses.course_level')->where('batch_teacher',Auth::user()->id)->get();
                                                @endphp
                                                @foreach ($courses as $course)
                                                <option value="{{$course->id}}" @if($course->id==$question->batch_id) Selected @endif>{{$course->course_name.'-'.$course->course_title.'-'.$course->course_level.'-'.$course->batch_name.'-'.$course->batch_number}}</option>
                                                @endforeach
                                              </select>
                                          </div>
                                          <div class="form-group col-6">
                                            <label for="recipient-name" class="col-form-label"><strong>Mark</strong></label>
                                            <input type="text" class="form-control border-info" name="mark" value="{{ $question->mark }}" required>
                                          </div>
                                          <div class="form-group col-6">
                                            <label for="recipient-name" class="col-form-label"><strong>Minus Mark</strong></label>
                                            <input type="text" class="form-control border-info" name="minus_mark" value="{{ $question->minus_mark }}" required>
                                          </div>
                                          <div class="form-group col-6">
                                            <label for="recipient-name" class="col-form-label"><strong>Exam Duration</strong></label>
                                            <input type="text" class="form-control border-info" value="{{ $question->exam_duration }}" name="exam_duration" required>
                                          </div>
                                          <div class="form-group col-6">
                                            <label for="recipient-name" class="col-form-label"><strong>Exam Date</strong></label>
                                            <input type="date" class="form-control border-info" value="{{ $question->exam_date }}" name="exam_date" required>
                                          </div>
                                          <div class="form-group col-6">
                                            <label for="recipient-name" class="col-form-label"><strong>Exam Start Time</strong></label>
                                            <input type="time" class="form-control border-info" value="{{ $question->exam_start_time }}" name="exam_start_time" required>
                                          </div>
                                          <div class="form-group col-6">
                                            <label for="recipient-name" class="col-form-label"><strong>Exam End Time</strong></label>
                                            <input type="time" class="form-control border-info" value="{{ $question->exam_end_time }}" name="exam_end_time" required>
                                          </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary form-control">UPDATE</button>
                                    </div>
                                  </form>
                                </div>

                              </div>
                            </div>
                          </div>


                        @if ($question->question_status=='Taken')
                        <a href="{{ route('all_student_mark',$question->id) }}" class="btn btn-primary">Marks</a>
                        @else
                        @if ($question->question_status=='Disable')
                        <a data-toggle="modal" data-target="#example-{{ $question->id }}" data-backdrop="static" data-keyboard="false" style="font-size: 18px; color:rgb(72, 48, 180)"><i class="fa fa-pencil-square-o"></i></a><br><br>
                        @endif
                        @if ($question->question_status=='Disable')
                        <a href="{{ route('update_question_status',['Enable',$question->id]) }}" style="font-size: 18px; color:rgb(16, 236, 16)"><i class="fa fa-check-square-o"></i></a><br><br>
                        @elseif($question->question_status=='Enable')
                        <a href="{{ route('update_question_status',['Disable',$question->id]) }}" style="font-size: 18px;" class="text-warning"><i class="fa fa-times-rectangle-o"></i></a><br><br>
                        @endif
                        @if ($question->question_status=='Disable')
                        <a onclick="return confirm('Are you sure want to delete ?')" href="{{ route('delete_question',$question->id) }}" style="font-size: 18px;color:red"><i class="fa fa-trash-o"></i></a><br><br>
                        @endif
                        <a href="{{ route('add_question',$question->id) }}" class="btn btn-primary">Questions</a><br><br>
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
