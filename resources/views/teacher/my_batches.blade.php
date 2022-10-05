@extends('layouts.app')


@section('content')
<div class="content-wrapper">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title">My Batches
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
                      <td><a href="{{ route('batch_student',$batch->id) }}" class="btn btn-sm btn-primary">Students</a></td>
                      {{-- <td>
                        <a onclick="return confirm('Are you sure ? ')" href="{{ route('delete_batch',$batch->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a><br><br>
                        @if ($batch->batch_status=='Enable')
                        <a href="{{ route('update_batch',[$batch->id,'Disable']) }}" class="btn btn-info"><i class="fa fa-times"></i></a>
                        @else
                        <a href="{{ route('update_batch',[$batch->id,'Enable']) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                        @endif
                      </td> --}}
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
