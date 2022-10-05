@extends('layouts.app')


@section('content')

<div class="content-wrapper">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title">Students - {{$students->count()}}
        </h4>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table table-bordered">
                <thead>
                  <tr>
                      <th>Student Name</th>
                      <th>Student Phone Number</th>
                      <th>Student Email</th>
                      <th>Student Address</th>
                      <th>Image</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->user_address }}</td>
                    <td><img src="{{ $student->user_image }}" alt=""></td>
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
