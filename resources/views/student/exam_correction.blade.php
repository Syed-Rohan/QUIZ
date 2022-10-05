@extends('layouts.app')


@section('content')
{{-- @php
    $course = DB::table('courses')->where('id',$question->course_id)->first();
    $batch = DB::table('batches')->where('id',$question->batch_id)->first();
@endphp --}}
<form>
<div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card" id="reportPrinting">
          <div class="card-body">
            <h4 class="card-title text-right" id="demo"> Obtain Mark -
                @php
                    $mark = DB::table('mcq_marks')->where('mcq_marks_question_id',$question->id)->where('mcq_marks_user_id',Auth::user()->id)->first();
                    if($mark){
                        echo $mark->mcq_marks_total;
                    }
                @endphp
            </h4>
            <h4 class="card-title text-center">{{ $question->question_level }}</h4>
            <p class="text-center">
                <span><strong>Subject : </strong>{{ $question->subject }}</span><br>
                <span><strong>Course : </strong>{{ $question->course_name."-".$question->course_title }}</span><br>
                <span><strong>Batch : </strong>{{ $question->batch_name }}</span><br>
                <span><strong>Marks : </strong>{{ $question->mark }}</span>,<span><strong>Minus Marks : </strong>{{ $question->minus_mark }}</span>,<span><strong>Times : </strong>{{ $question->exam_duration." Minutes" }}</span>
            </p>
            <div class="row mt-3">

              @if($question->question_type!='2')
              @php
                  $mcqs = DB::table('mcq_questions')->where('question_id',$question->id)->orderBy('mcq_question_id','DESC')->get();
              @endphp
              @foreach ($mcqs as $mcq)
              @php
                  $user_ans = DB::table('mcq_answers')->where('mcq_answer_mcq_id',$mcq->mcq_question_id)->where('mcq_answer_user_id',Auth::user()->id)->first();
              @endphp
              <div class="col-md-6 h-100">
                <div class="bg-secondary p-4">
                  <h6 class="card-title" style="font-weight: 1000">{!! $mcq->mcq_question !!}</h6>
                  <div id="profile-list-left" class="py-2">
                    <div class="card rounded mb-2">
                        <div class="card-body p-2" @if($user_ans && $user_ans->user_answer=='option_a' && $user_ans->mcq_answer_status=='Incorrect') style="background:red;" @endif @if($user_ans && $user_ans->correct_answer=='option_a' && $user_ans->mcq_answer_status=='Correct') style="background:green;" @endif>
                          <div class="row">
                              <div class="col-lg-1 col-sm-1 text-pink">
                                <input style="background:rgb(153, 44, 44)" type="radio"  value="option_a" disabled @if($user_ans && $user_ans->user_answer=='option_a') checked @endif @if($user_ans && $user_ans->correct_answer=='option_a') style="background:green;" @endif>
                              </div>
                              <div class="col-lg-11 col-sm-11" >
                                  {!! $mcq->option_a !!}
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="card rounded mb-2">
                        <div class="card-body p-2" @if($user_ans && $user_ans->user_answer=='option_b' && $user_ans->mcq_answer_status=='Incorrect') style="background:red;" @endif @if($user_ans && $user_ans->correct_answer=='option_b' && $user_ans->mcq_answer_status=='Correct') style="background:green;" @endif @if($user_ans && $user_ans->correct_answer=='option_b') style="background:green;" @endif>
                          <div class="row">
                              <div class="col-lg-1 col-sm-1">
                                <input type="radio" value="option_b" disabled  @if($user_ans && $user_ans->user_answer=='option_b') checked @endif>
                              </div>
                              <div class="col-lg-11 col-sm-11" >
                                  {!! $mcq->option_b !!}
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="card rounded mb-2">
                        <div class="card-body p-2" @if($user_ans && $user_ans->user_answer=='option_c' && $user_ans->mcq_answer_status=='Incorrect') style="background:red;" @endif @if($user_ans && $user_ans->correct_answer=='option_c' && $user_ans->mcq_answer_status=='Correct') style="background:green;" @endif @if($user_ans && $user_ans->correct_answer=='option_c') style="background:green;" @endif>
                          <div class="row">
                              <div class="col-lg-1 col-sm-1">
                                <input type="radio" value="option_c" disabled  @if($user_ans && $user_ans->user_answer=='option_c') checked @endif>
                              </div>
                              <div class="col-lg-11 col-sm-11" >
                                  {!! $mcq->option_c !!}
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="card rounded mb-2">
                        <div class="card-body p-2" @if($user_ans && $user_ans->user_answer=='option_d' && $user_ans->mcq_answer_status=='Incorrect') style="background:red;" @endif @if($user_ans && $user_ans->correct_answer=='option_d' && $user_ans->mcq_answer_status=='Correct') style="background:green;" @endif @if($user_ans && $user_ans->correct_answer=='option_d') style="background:green;" @endif>
                          <div class="row">
                              <div class="col-lg-1 col-sm-1">
                                <input type="radio" value="option_d" disabled  @if($user_ans && $user_ans->user_answer=='option_d') checked @endif >
                              </div>
                              <div class="col-lg-10 col-sm-10" >
                                  {!! $mcq->option_d !!}
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="card rounded mb-2">
                        <div class="card-body p-2">
                          <div class="row">
                              <div class="col-lg-12 col-sm-12" >
                                  <strong>Your Ans : </strong>@if($user_ans->user_answer==NULL) Not chosen @else {{$user_ans->user_answer}} @endif ,
                                  <strong>Question Status :</strong> {{$user_ans->mcq_answer_status}}
                              </div>
                          </div>
                        </div>
                      </div>

                  </div>
                </div>
              </div>
              @endforeach
              @endif
            </div>
          </div>
        </div>
      <script type="text/javascript">
        function printReport()
        {
            var prtContent = document.getElementById("reportPrinting");
            var WinPrint = window.open();
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    </script>
        <button type="button" class="btn btn-primary form-control" onClick="printReport()">Print</button>
      </div>
    </div>
  </div>
</form>
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
  @elseif(Session::get('success_insert'))
  <script >
    window.onload=function(){
      showSwal('success-message','Successfully Inserted');
    }
  </script>
  @endif

@endsection
