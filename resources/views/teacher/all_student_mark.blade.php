@extends('layouts.app')


@section('content')

<div class="content-wrapper">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title">Students Mark
        </h4>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table table-bordered">
                <thead>
                  <tr>
                      <th>Student Name</th>
                      <th>Student Phone Number</th>
                      @if ($question->question_type!=2)
                      <th>Student MCQ Mark</th>
                      @endif
                      @if ($question->question_type!=1)
                      <th>Student Written Mark</th>
                      @endif
                  </tr>
                </thead>
                <tbody>
                    @php
                        $students = DB::table('enrolled_courses')
                        ->join('users','enrolled_courses.enroll_user_id','users.id')
                        ->where('enroll_course_id',$question->course_id)->where('enroll_batch_id',$question->batch_id)->get();
                    @endphp
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->phone }}</td>
                        @if ($question->question_type!=2)
                        @php
                            $mcq = DB::table('mcq_marks')->where('mcq_marks_question_id',$question->id)->where('mcq_marks_user_id',$student->id)->first();
                        @endphp
                        <td>
                            @if ($mcq)
                            {{$mcq->mcq_marks_total}}
                            @else
                            Absent
                            @endif
                        </td>
                        @endif
                        @if ($question->question_type!=1)
                        @php
                            $wrt = DB::table('written_marks')->where('written_marks_question_id',$question->id)->where('written_marks_user_id',$student->id)->first();
                        @endphp
                        <td>

                            @if ($wrt)
                            {{$wrt->written_marks_total}}
                            @else
                            Absent
                            @endif
                            <!-- Modal -->
                            @if ($wrt)
                            <div class="modal fade" id="exampleModal{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Remark</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('update_written_mark') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for=""> <Strong>Mark</Strong></label>
                                                <input type="number" min="0" value="{{$wrt->written_marks_total}}" class="form-control border-dark" name="mark" required>
                                                <input type="hidden" value="{{$wrt->written_marks_id }}" name="written_marks_id">
                                            </div>
                                            <div class="form-group">
                                                <a href="{{ asset($wrt->written_answer) }}" class="btn btn-dark">Answer Sheet</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success py-2 float-right">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <button class="btn btn-primary ml-3"  data-toggle="modal" data-target="#exampleModal{{ $student->id }}">Remark</button>
                            @endif
                        </td>
                        @endif
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
