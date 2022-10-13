@extends('admin.layouts.master')

@section('content')
    <div class="col-md-10 offset-1">


        <div class="card">
            <div class="card-header">
                <div class="card-title">Category Informations</div>
            </div>
            <div class="card-body">
                <form action="{{route('admin#updateCategory',$data->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="categoryName" placeholder="Enter category..." class="form-control" value="{{$data->title}}">
                        @error('categoryName')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Category Description</label>
                        <textarea name="categoryDescription" cols="30" rows="5" class="form-control" placeholder="Enter description...">{{$data->description}}</textarea>
                        @error('categoryDescription')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="button-group">
                        <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
