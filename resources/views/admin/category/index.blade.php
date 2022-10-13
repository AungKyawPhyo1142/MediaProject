@extends('admin.layouts.master')

@section('content')
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Insert Category Informations</div>
            </div>
            <div class="card-body">
                <form action="{{route('admin#createCategory')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="categoryName" placeholder="Enter category..." class="form-control">
                        @error('categoryName')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Category Description</label>
                        <textarea name="categoryDescription" cols="30" rows="5" class="form-control" placeholder="Enter description..."></textarea>
                        @error('categoryDescription')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="button-group">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- alert start --}}
        @if (session('insertSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('insertSuccess')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('deleteSuccess'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{session('deleteSuccess')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        {{-- alert end --}}
    </div>

    <div class="col-7 offset-1">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Category List</h3>

        <div class="card-tools">
            <form action="{{route('admin#searchCategory')}}" method="POST">
                @csrf
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="searchKey" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
            </form>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap text-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Description</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        <a href="{{route('admin#categoryEditPage',$item->id)}}" class="btn btn-sm bg-dark text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{route('admin#deleteCategory',$item->id)}}" class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>

    @if (session('updateSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('updateSuccess')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    </div>
@endsection
