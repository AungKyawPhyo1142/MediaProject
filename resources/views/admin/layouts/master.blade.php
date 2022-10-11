<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Project Media</title>
</head>
<body>
    <div class=" p-2">

        <div class="row">

            {{-- side bar --}}
            <div class="col-3 text-center">
                <button class="btn btn-dark text-white w-100 my-2"><i class="fa-solid fa-user me-2"></i>Profile</button>
                <button class="btn btn-dark text-white w-100 my-2"><i class="fa-solid fa-users me-2"></i>Admin List</button>
                <button class="btn btn-dark text-white w-100 my-2"><i class="fa-solid fa-list me-2"></i>Category List</button>
                <button class="btn btn-dark text-white w-100 my-2"><i class="fa-solid fa-newspaper me-2"></i>Posts</button>
                <button class="btn btn-dark text-white w-100 my-2"><i class="fa-solid fa-arrow-trend-up me-2"></i>Trending Posts</button>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-dark text-white w-100 my-2" type="submit"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</button>
                </form>
            </div>

            {{-- content --}}
            <div class="col">
                @yield('content')
            </div>

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
