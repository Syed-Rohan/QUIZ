@extends('layouts.app')


@section('content')
<div class="content-wrapper bg-content">
    <div class="row">
      <div class="col-md-6 col-lg-8 grid-margin stretch-card mx-auto">
        <div class="card bg-owhite">
            <div class="card-header">
                <h3 class="text-center text-pink my-auto ">Personal Information</h3>
            </div>
          <div class="card-body">
            @if(Session::get('success_update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="d-flex align-items-center justify-content-md-center">
                <div class="table-responsive">
                    <table class="table table-dark table-bordered">
                      <thead>

                      </thead>
                      <tbody>
                        <tr>
                          <th style="width: 40%;">
                            Name
                          </th>
                          <td>
                            {{Auth::user()->name}}
                          </td>
                        </tr>
                        <tr>
                            <th style="width: 40%;">
                              Gender
                            </th>
                            <td>
                              {{Auth::user()->gender}}
                            </td>
                          </tr>
                          <tr>
                            <th style="width: 40%;">
                              Phone
                            </th>
                            <td>
                              {{Auth::user()->phone}}
                            </td>
                          </tr>
                          <tr>
                            <th style="width: 40%;">
                              Email
                            </th>
                            <td>
                              {{Auth::user()->email}}
                            </td>
                          </tr>
                          <tr>
                            <th style="width: 40%;">
                              Father Name
                            </th>
                            <td>
                              {{Auth::user()->father_name}}
                            </td>
                          </tr>
                          <tr>
                            <th style="width: 40%;">
                              Mother Name
                            </th>
                            <td>
                              {{Auth::user()->mother_name}}
                            </td>
                          </tr>
                          <tr>
                            <th style="width: 40%;">
                              Address
                            </th>
                            <td>
                              {{Auth::user()->user_address}}
                            </td>
                          </tr>
                      </tbody>
                    </table>
                </div><br>

            </div>
            <div class="modal fade" id="example-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" >
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Personal Info</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{ route('personal_info_updfate') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label"><strong>Name</strong></label>
                          <input type="text" class="form-control border-info" value="{{Auth::user()->name}}" name="user_name" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"><strong>Fathert Name</strong></label>
                            <input type="text" class="form-control border-info" value="{{Auth::user()->father_name}}" name="father_name" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"><strong>Mother Name</strong></label>
                            <input type="text" class="form-control border-info" value="{{Auth::user()->mother_name}}" name="mother_name" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"><strong>Address</strong></label>
                            <textarea name="user_address" rows="8" class="form-control border-info" required>{{Auth::user()->user_address}}</textarea>
                        </div>
                        <div class="row">


                        <div class="form-group col-6">
                            <label for="recipient-name" class="col-form-label"><strong>Image</strong></label>
                            <input type="file" class="form-control border-info" name="user_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="form-group col-6">
                            <img class="mx-auto" id="blah" alt="No Image Selected" style="height: 100px; width:100px">
                        </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success form-control">Update</button>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>
              </div>
            <button class="btn btn-outline-info form-control mt-3" data-toggle="modal" data-target="#example-4">Update Personal Information</button>
          </div>
        </div>
      </div>
      {{-- <div class="col-md-6 col-lg-3 grid-margin stretch-card">
        <div class="card bg-owhite">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-md-center">

            </div>
          </div>
        </div>
      </div> --}}

    </div>


  </div>
@endsection
