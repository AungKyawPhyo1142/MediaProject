@extends('admin.layouts.master')

@section('content')
    <form action="">
        <div class="row p-2 align-items-center">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name...">
            </div>
        </div>
        <div class="row p-2 align-items-center">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter your email...">
            </div>
        </div>
        <div class="row p-2 align-items-center">
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" placeholder="Enter your phone number...">
            </div>
        </div>
        <div class="row p-2 align-items-center">
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <textarea name="address" id="" cols="20" rows="5" class="form-control" placeholder="Enter your address..."></textarea>
            </div>
        </div>
        <div class="row pt-2 pb-3 px-4 align-items-center justify-content-between">
            <button class="btn btn-primary col-3"><i class="fa-solid fa-pen-to-square me-2"></i>Update</button>
            <button class="btn btn-secondary col-3"><i class="fa-solid fa-key me-2"></i>Change Password </button>
        </div>
    </form>
@endsection
