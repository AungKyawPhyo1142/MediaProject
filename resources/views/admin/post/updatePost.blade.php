@extends('admin.layouts.master')

@section('content')
    <div class="col-md-10 offset-1">

        <div class="card">
            <div class="card-header">
                <div class="card-title">Post Informations</div>
            </div>
            <div class="card-body">
                <div class="row m-1">
                    <form action="{{route('admin#postUpdate',$data->id)}}" method="POST" enctype="multipart/form-data" class="row">
                        @csrf
                        <div class="col-6">
                                <div class="form-group">
                                    <label for="">Post Title</label>
                                    <input type="text" name="postTitle" placeholder="Enter category..." class="form-control" value="{{$data->title}}">
                                    @error('postTitle')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Post Description</label>
                                    <textarea name="postDescription" cols="30" rows="5" class="form-control" placeholder="Enter description...">{{$data->description}}</textarea>
                                    @error('postDescription')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="postCategory" id="" class="form-control">
                                        @foreach ($category as $c)
                                            <option value="{{$c->id}}" @if ($c->id == $data->category_id) selected @endif>{{$c->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Post Image</label>
                                    <input type="file" name="postImage" class="form-control" id="">
                                    @error('postImage')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror

                                </div>
                        </div>
                        <div class="col d-flex flex-column justify-content-center align-items-center">
                            <div class="row mb-2">
                                @if ($data->image!=null)
                                    <img src="{{asset('postImage/'.$data->image)}}" class="img-thumbnail" alt="">
                                @else
                                    <img src="{{asset('defaultImage/default_post_image.png')}}" class="img-thumbnail" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="button-group">
                            <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
