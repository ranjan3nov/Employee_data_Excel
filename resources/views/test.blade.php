<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    {{-- Navbar Start --}}
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">4sTechonlogy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{url('/searchEmployee')}}">Search Employee</a>
                    </li>
                </ul>
            </div>
            <x-app-layout>
            </x-app-layout>
        </div>
    </nav>
    {{-- Navbar End --}}

    <div class="container">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>

        @elseif(Session::has('error'))

        <div class="alert alert-danger" role="alert">
            {{Session::get('error')}}
        </div>

        @endif

        <div class="flex justify-center mt-5 pt-5">
            <form class="row g-3" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col">
                    <input class="form-control form-control-lg" type="file" name="file">
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-outline-primary mb-3">Submit</button>
                </div>
            </form>
        </div>

        <h2 class="text-center mt-5">Add Employee</h2>
        <div class="d-flex justify-content-center">

            <form class="row g-3">
                <div class="col-auto">
                    <input type="text" class="form-control-plaintext" placeholder="Employee Name">
                </div>
                <div class="col-auto">
                    <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-success mb-3">Confirm identity</button>
                </div>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>