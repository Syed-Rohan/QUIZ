@extends('layouts.app')


@section('content')
<div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        <div class="modal fade" id="example-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add New batch</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="{{ route('add_batch_insert') }}">
                    @csrf
                    <div class="row">
                          <div class="form-group col-6">
                            <label for="recipient-name" class="col-form-label"><strong>Batch Name</strong></label>
                            <input type="text" class="form-control border-info" name="batch_name" required>
                          </div>
                          <div class="form-group col-6">
                              <label for="recipient-name" class="col-form-label"><strong>Batch Number</strong></label>
                              <select class="form-control border-info"  name="batch_number" required>
                                @php
                                    for($i=1;$i<=10;$i++){
                                        echo "<option value='".$i."'>".$i."</option>";
                                    }
                                @endphp
                              </select>
                          </div>
                          <div class="form-group col-4">
                            <label for="recipient-name" class="col-form-label"><strong>Batch Schedule</strong></label>
                            <input type="text" class="form-control border-info" name="batch_schedule" required>
                          </div>
                          <div class="form-group col-4">
                            <label for="recipient-name" class="col-form-label"><strong>Batch Start</strong></label>
                            <input type="date" class="form-control border-info" name="batch_start" required>
                          </div>
                          <div class="form-group col-4">
                            <label for="recipient-name" class="col-form-label"><strong>Select Course</strong></label>
                            <select  class="form-control border-info" name="course_id" required>
                                @php
                                    $courses = DB::table('courses')->where('course_delete',0)->where('course_status','Enable')->orderBy('id','DESC')->get();
                                @endphp
                                @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach

                            </select>
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

          <div class="modal fade" id="example-5" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add Batch Teacher</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="{{ route('add_batch_teacher') }}">
                    @csrf
                    <div class="row">
                          <div class="form-group col-6">
                            <label for="recipient-name" class="col-form-label"><strong>Batch Name</strong></label>
                            <select class="form-control border-info" name="batch_id" required>
                                @foreach ($batches as $batch)
                                <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
                                @endforeach

                            </select>
                          </div>
                          <div class="form-group col-6">
                              <label for="recipient-name" class="col-form-label"><strong>Batch Number</strong></label>
                              <select class="form-control border-info"  name="batch_number" required>
                                @php
                                    for($i=1;$i<=10;$i++){
                                        echo "<option value='".$i."'>".$i."</option>";
                                    }
                                @endphp
                              </select>
                          </div>
                          <div class="form-group col-6">
                            <label for="recipient-name" class="col-form-label"><strong>Select Batch Teacher</strong></label>
                            <select  class="form-control border-info" name="batch_teacher" required>
                                @php
                                    $us = DB::table('users')->where('user_type',3)->where('user_status','Enable')->orderBy('id','DESC')->get();
                                @endphp
                                @foreach ($us as $u)
                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach

                            </select>
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
        <h4 class="card-title">Batches
            <button class="btn btn-outline-info" data-toggle="modal" data-target="#example-4" data-backdrop="static" data-keyboard="false">Add</button>
            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#example-5" data-backdrop="static" data-keyboard="false">Add Batch Teacher</button>
        </h4>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table table-bordered">
                <thead>
                  <tr>
                      <th>Batch Name</th>
                      <th>Batch Number</th>
                      <th>Course Name</th>
                      <th>Batch Teacher</th>
                      <th>Batch Schedule</th>
                      <th>Batch Status</th>
                      <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($batches as $batch)
                  <tr>
                      <td>{{ $batch->batch_name }}</td>
                      <td>{{ $batch->batch_number }}</td>
                      <td>{{ $batch->course_name }}</td>
                      <td>
                        Start : {{$batch->batch_start}} <br><br>
                        @if ($batch->batch_teacher!=NULL)
                            @php
                                $teacher = DB::table('users')->where('id',$batch->batch_teacher)->select('users.name','users.phone')->first();
                                echo $teacher->name."<br> <br>";
                                echo "Mobile : ".$teacher->phone;
                            @endphp
                        @else
                        {{ $batch->batch_teacher }}
                        @endif

                      </td>
                      <td>{{ $batch->batch_schedule }}</td>
                      <td>{{ $batch->batch_status }}</td>
                      <td>
                        <a onclick="return confirm('Are you sure ? ')" href="{{ route('delete_batch',$batch->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a><br><br>
                        @if ($batch->batch_status=='Enable')
                        <a href="{{ route('update_batch',[$batch->id,'Disable']) }}" class="btn btn-info"><i class="fa fa-times"></i></a>
                        @else
                        <a href="{{ route('update_batch',[$batch->id,'Enable']) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
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
