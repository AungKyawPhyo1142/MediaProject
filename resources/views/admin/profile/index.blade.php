@extends('admin.layouts.master')

@section('content')

<div class="col-8 offset-3 mt-5">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <legend class="text-center">User Profile</legend>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">

                {{-- alert start --}}
                @if (session('updateSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('updateSuccess')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                {{-- alert end --}}

              <form class="form-horizontal" action="{{route('admin#updateData')}}" method="post">
                @csrf
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter name..." value="{{old('name',$currentProfileData->name)}}">
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Enter email address..." value="{{old('email',$currentProfileData->email)}}">
                    @error('email')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                    </div>
                </div>

                <div class="form-group row">
                  <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                  <div class="col-sm-10">
                    <select name="gender" class="form-control" id="gender">
                        <option value="" @if($currentProfileData->gender=='') selected @endif>Choose your gender</option>
                        <option value="male" @if($currentProfileData->gender=='male') selected @endif>Male</option>
                        <option value="female" @if($currentProfileData->gender=='female') selected @endif>Female</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone..." value="{{$currentProfileData->phone}}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="address" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <textarea name="address" class="form-control" id="address" cols="30" rows="5" placeholder="Enter your address...">{{$currentProfileData->address}}</textarea>
                  </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2 d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="text-muted">Change Password</a>
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
