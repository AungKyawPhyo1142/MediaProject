@extends('admin.layouts.master')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Trending Posts</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                        <tr class="row">
                            <th class="col-2">ID</th>
                            <th class="col">Image</th>
                            <th class="col">Post Title</th>
                            <th class="col">Views</th>
                            <th class="col">Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $item)
                            <tr class="row">
                                <td class="col-2">{{ $item['id'] }}</td>
                                <td class="col">
                                    @if ($item['image'] != null)
                                        <img src="{{ asset('postImage/' . $item['image']) }}"
                                            class="img-thumbnail  w-50 shadow-sm">
                                    @else
                                        <img src="{{ asset('defaultImage/default_post_image.png') }}"
                                            class="img-thumbnail w-50 shadow-sm">
                                    @endif

                                </td>
                                <td class="col">{{ $item['title'] }}</td>
                                <td class="col"><i class="fa-solid fa-eye me-1"></i>{{ $item['post_count'] }}</td>
                                <td class="col">
                                    <a href="{{ route('admin#trendPostDetails', [$item['id'], $item['post_count']]) }}"
                                        class="btn btn-sm bg-dark text-white border rounded"><i
                                            class="fa-solid fa-circle-info"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        {{-- {{ $posts->links() }} --}}

    </div>
@endsection
