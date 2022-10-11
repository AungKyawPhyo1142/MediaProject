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
              <form class="form-horizontal">

                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="gender" placeholder="Gender">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" placeholder="Phone">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="address" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="address" placeholder="Address">
                  </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2 d-flex align-items-center justify-content-between">
                        <button class="btn btn-primary">Submit</button>
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
