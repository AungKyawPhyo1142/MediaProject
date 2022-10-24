@extends('admin.layouts.master')

@section('content')
    <div class="col-md-10 offset-1">

        <div class="card">
            <div class="card-header">
                <div class="card-title">Trending Post Detail Informations</div>
            </div>
            <div class="card-body">
                <div class="row m-1">
                    <div class="col-6">
                        <div class="form-group">
                            <h1>{{ $data->title }}</h1>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-sm btn-outline-secondary">{{ $category->title }}</a>
                            <a class="btn btn-sm btn-outline-secondary"><i
                                    class="fa-solid fa-eye me-1"></i>{{ $count }}</a>
                        </div>
                        <div class="form-group">
                            <p>
                                {{ $data->description }}
                            </p>
                        </div>
                    </div>
                    <div class="col d-flex flex-column justify-content-center align-items-center">
                        <div class="row mb-2">
                            @if ($data->image != null)
                                <img src="{{ asset('postImage/' . $data->image) }}" class="img-thumbnail" alt="">
                            @else
                                <img src="{{ asset('defaultImage/default_post_image.png') }}" class="img-thumbnail"
                                    alt="">
                            @endif
                        </div>
                    </div>
                    <div class="button-group col-6 d-flex flex-col justify-content-between">
                        <a href="{{ route('admin#trendPost') }}" class="btn btn-dark"><i
                                class="fa-solid fa-angle-left me-1"></i>Back</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
