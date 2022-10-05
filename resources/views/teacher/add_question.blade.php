@extends('layouts.app')


@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModalLongMCQ" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">MCQ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('add_mcq') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for=""><strong>MCQ Question</strong></label>
                    <textarea name="mcq_question" id="summernoteExample" rows="5" cols="4" class="form-control border-primary" rows="4" required></textarea>
                    <input type="hidden" name="question_id" class="form-control border-primary" value="{{$question->id}}">
                </div>
                <div class="form-group">
                    <label for=""><strong>Option A</strong></label>
                    <textarea name="option_a" id="summernoteExample2" class="form-control border-primary" required></textarea>
                </div>
                <div class="form-group">
                    <label for=""><strong>Option B</strong></label>
                    <textarea name="option_b" id="summernoteExample3" class="form-control border-primary" required></textarea>
                </div>
                <div class="form-group">
                    <label for=""><strong>Option C</strong></label>
                    <textarea name="option_c" id="summernoteExample4" class="form-control border-primary" required></textarea>
                </div>
                <div class="form-group">
                    <label for=""><strong>Option D</strong></label>
                    <textarea name="option_d" id="summernoteExample5" class="form-control border-primary" required></textarea>
                </div>
                <div class="form-group">
                    <label for=""><strong>Question Mark</strong></label>
                    <input type="number" name="mcq_question_mark" class="form-control border-primary" value="1" min="1" required>
                </div>
                <div class="form-group">
                    <label for=""><strong>Correct Ans</strong></label>
                    <select name="correct_ans" class="form-control border-primary" required>
                        <option value="option_a" selected>Option A</option>
                        <option value="option_b">Option B</option>
                        <option value="option_c">Option C</option>
                        <option value="option_d">Option D</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">ADD</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
<!--End Moadl -->
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
            <form action="{{ route('add_written') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Question Paper ( .pdf )</label>
                    <input type="file" name="written_question" class="form-control border-primary" required>
                    <input type="hidden" name="question_id" class="form-control border-primary" value="{{$question->id}}">
                </div>
                <div class="form-group">
                    <label for="">Question Mark</label>
                    <input type="number" name="written_question_mark" class="form-control border-primary" value="25" min="1" required>
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
<div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">Oquestions Of #{{ $question->id."-".$question->course_title."-".$question->batch_id."-".$question->batch_name."-".$question->question_level }}</h4>
            @if($question->question_type=='1')
            <button class="btn btn-outline-info ml-2" data-toggle="modal" data-target="#exampleModalLongMCQ">Add MCQ</button>
            @elseif($question->question_type=='2')
            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalLongWr">Add Written Question</button>
            @else
            <button class="btn btn-outline-info ml-2" data-toggle="modal" data-target="#exampleModalLongMCQ">Add MCQ</button>
            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalLongWr">Add Written Question</button>
            @endif

            <div class="row mt-3">

                @php
                    $wq = DB::table('written_questions')->where('question_id',$question->id)->orderBy('written_question_id','DESC')->first();
                @endphp
                @if ($wq)
                  <div class="col-md-12 text-center mb-3">
                    <a href="{{ asset($wq->written_question) }}" target="__blank">Written Question </a>
                  </div>
                @endif
              @php
                  $mcqs = DB::table('mcq_questions')->where('question_id',$question->id)->orderBy('mcq_question_id','DESC')->get();
              @endphp
              @foreach ($mcqs as $mcq)
              <div class="col-md-6 h-100">
                <div class="bg-secondary p-4">
                  <h6 class="card-title">{!! $mcq->mcq_question !!}</h6>
                  <div id="profile-list-left" class="py-2">
                    <div class="card rounded mb-2">
                        <div class="card-body p-2">
                          <div class="row">
                              <div class="col-lg-1 col-sm-1">
                                  A.
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
                                  B.
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
                                  C.
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
                                D.
                            </div>
                            <div class="col-lg-11 col-sm-11">
                                {!! $mcq->option_d !!}
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card rounded mb-2">
                        <div class="card-body p-2">
                          <div class="media">
                            <div class="media-body">
                              <h6 class="mb-1">Correct Ans : {{ $mcq->mcq_question_ans.' , Mark : '.$mcq->mcq_question_mark }}</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              @endforeach
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
  @elseif(Session::get('success_insert'))
  <script >
    window.onload=function(){
      showSwal('success-message','Successfully Inserted');
    }
  </script>
  @endif

@endsection
