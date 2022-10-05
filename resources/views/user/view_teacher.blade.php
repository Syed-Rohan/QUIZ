@extends('layouts.app')


@section('content')
<div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        @php
            $ts = DB::table('teachers')->first();
        @endphp
        <h4 class="card-title">Registration Request
            @if($ts->teacher_status==0)
            <a href="{{ route('teacher_status',1) }}" class="btn btn-primary">Enable</a>
            @else
            <a href="{{ route('teacher_status',0) }}" class="btn btn-primary">Disable</a>
            @endif

        </h4>
        <div class="images">

        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table table-bordered">
                <thead>
                  <tr>
                      <th>Teacher Name</th>
                      <th>Teacher Phone</th>
                      <th>Teacher Email</th>
                      <th>Teacher Image</th>
                      <th>Details</th>
                      <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($teachers as $teacher)
                  <tr>
                      <td>{{ $teacher->name }}</td>
                      <td>{{ $teacher->phone }}</td>
                      <td>{{ $teacher->email }}</td>
                      <td><figure>
                        <img src="{{ asset($teacher->user_image) }}" alt="" />
                        {{-- <figcaption>{{ $teacher->name }}</figcaption> --}}
                    </figure></td>
                      <td>
                        <strong>Father : </strong>{{ $teacher->father_name }} <br><br>
                        <strong>Mother : </strong>{{ $teacher->mother_name }} <br><br>
                        <strong class="text-pink">Status : </strong>{{ $teacher->user_status }} <br><br>
                        <strong>Address : </strong>{{ $teacher->user_address }} <br><br>

                      </td>
                      <td>
                        @if ($teacher->user_status=='Enable')
                        <a href="{{ route('accept_teacher',[$teacher->id,'Disable']) }}" class="btn btn-primary">Disable</a>
                        @elseif($teacher->user_status=='Disable')
                        <a href="{{ route('accept_teacher',[$teacher->id,'Enable']) }}" class="btn btn-primary">Enable</a>
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
