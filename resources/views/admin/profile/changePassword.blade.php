@extends('admin.layouts.master')

@section('content')

<div class="col-8 offset-2 mt-5">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header p-2">
          <legend class="text-center">Change Password</legend>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">

              <form class="form-horizontal" action="{{route('admin#passwordChange')}}" method="post">
                @csrf
                <div class="form-group row">
                  <label for="oldPassword" class="col-sm-2 col-form-label">Old Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Enter old password...">
                    @error('oldPassword')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter new password...">
                    @error('newPassword')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm password...">
                    @error('confirmPassword')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2 d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </div>

            </form>

            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
