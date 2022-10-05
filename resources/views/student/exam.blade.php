@extends('layouts.app')


@section('content')
{{-- @php
    $course = DB::table('courses')->where('id',$question->course_id)->first();
    $batch = DB::table('batches')->where('id',$question->batch_id)->first();
@endphp --}}
<!-- Modal -->
<div class="modal fade" id="exampleModalLongWr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Written Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('written_ans') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Question Paper ( .pdf )</label>
                    <input type="file" name="written_question" class="form-control border-primary" required>
                    <input type="hidden" name="question_id" class="form-control border-primary" value="{{$question->id}}">
                </div>

                <div class="form-group">
                    <button type="submity" class="btn btn-primary form-control">ADD</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
<!--End Moadl -->
<form id="exam_form" action="{{ route('exam_insert') }}" method="POST" enctype="multipart/form-data">
    @csrf
<input type="hidden" name="question_id" value="{{ $question->id }}">
<input type="hidden" name="attemp_id" value="{{ $attemp->attemp_id }}">
<div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-right" id="demo"></h4>
            <script>
                // Set the date we're counting down to
                var countDownDate = new Date("{{$question->exam_date}} {{$attemp->attemp_end_time}}").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                  // Get today's date and time
                  var now = new Date().getTime();

                  // Find the distance between now and the count down date
                  var distance = countDownDate - now;

                  // Time calculations for days, hours, minutes and seconds
                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                  // Output the result in an element with id="demo"
                  document.getElementById("demo").innerHTML ="<span class='text-danger'>Remaining Time -- </span>" + hours + "<span class='text-success'>h </span>"
                  + minutes + "<span class='text-primary'>m </span>" + seconds + "<span class='text-pink'>s </span>";

                  // If the count down is over, write some text
                  if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "<span class='text-danger'>Exam Time Over</span>";
                    submitForm();
                  }
                }, 1000);
                </script>



            <h4 class="card-title text-center">{{ $question->question_level }}</h4>
            <p class="text-center">
                <span><strong>Subject : </strong>{{ $question->subject }}</span><br>
                <span><strong>Course : </strong>{{ $question->course_name."-".$question->course_title }}</span><br>
                <span><strong>Batch : </strong>{{ $question->batch_name }}</span><br>
                <span><strong>Marks : </strong>{{ $question->mark }}</span>,<span><strong>Minus Marks : </strong>{{ $question->minus_mark }}</span>,<span><strong>Times : </strong>{{ $question->exam_duration." Minutes" }}</span>
            </p>
            <div class="row mt-3">

                @php
                    $wq = DB::table('written_questions')->where('question_id',$question->id)->orderBy('written_question_id','DESC')->first();
                @endphp
                @if ($wq)
                  <div class="col-md-12 text-center mb-3">
                    <a href="{{ asset($wq->written_question) }}" target="__blank">Download Written Question </a>
                  </div>
              @endif
              @if($question->question_type!='1')
              <div class="col-md-12 mb-3 h-100">
                <div class="bg-secondary p-4">
                  <h6 class="card-title">Written Sheet Submit Here <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLongWr">Submit</button></h6>
                  <div class="card rounded mb-2">
                    <div class="card-body p-2">
                      @php
                          $write = DB::table('written_marks')->where('written_marks_user_id',Auth::user()->id)->where('written_marks_question_id',$question->id)->first();
                      @endphp
                      @if ($write)
                      <a href="{{ asset($write->written_answer) }}" target="__blank">My Written Question </a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              @endif
              @if($question->question_type!='2')
              @php
                  $mcqs = DB::table('mcq_questions')->where('question_id',$question->id)->orderBy('mcq_question_id','DESC')->get();
                  $i=0;
              @endphp
              @foreach ($mcqs as $mcq)
              @php
                  $i++;
              @endphp
              <input type="hidden" name="mcq_id{{$i}}" value="{{$mcq->mcq_question_id}}">
              <div class="col-md-6 h-100">
                <div class="bg-secondary p-4">
                  <h6 class="card-title" style="font-weight: 1000">{!! $mcq->mcq_question !!}</h6>
                  <div id="profile-list-left" class="py-2">
                    <div class="card rounded mb-2">
                        <div class="card-body p-2">
                          <div class="row">
                              <div class="col-lg-1 col-sm-1">
                                <input type="radio" name="mcq{{$i}}" value="option_a">
                              </div>
                              <div class="col-lg-11 col-sm-11">
                                  {!! $mcq->option_a !!}
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="card rounded mb-2">
                        <div class="card-body p-2">
                          <div class="row">
                              <div class="col-lg-1 col-sm-1">
                                <input type="radio" name="mcq{{$i}}" value="option_b">
                              </div>
                              <div class="col-lg-11 col-sm-11">
                                  {!! $mcq->option_b !!}
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="card rounded mb-2">
                        <div class="card-body p-2">
                          <div class="row">
                              <div class="col-lg-1 col-sm-1">
                                <input type="radio" name="mcq{{$i}}" value="option_c">
                              </div>
                              <div class="col-lg-11 col-sm-11">
                                  {!! $mcq->option_c !!}
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="card rounded mb-2">
                        <div class="card-body p-2">
                          <div class="row">
                              <div class="col-lg-1 col-sm-1">
                                <input type="radio" name="mcq{{$i}}" value="option_d">
                              </div>
                              <div class="col-lg-11 col-sm-11">
                                  {!! $mcq->option_d !!}
                              </div>
                          </div>
                        </div>
                      </div>

                  </div>
                </div>
              </div>
              @endforeach
              <input type="hidden" name="count" value="{{$i}}">
                <button onclick="return confirm('Are you sure want to delete ? ')" type="submit" class="btn btn-primary form-control mt-3">Submit</button>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
    function submitForm(){
        $.ajax({
            url:"{{route('exam_insert_json')}}",
            type:"POST",
            data: $('#exam_form').serialize(),
            success : function(response){
                window.location.href="/laravel_9/exam_app/todays-exam";
            },
        });
    }
</script>
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
