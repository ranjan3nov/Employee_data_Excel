<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">

</head>

<body>
    {{-- Navbar Start --}}
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Ranjan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="{{url('/addEmployee')}}">Add Employee</a>
                    </li>
                </ul>
            </div>
            <x-app-layout>
            </x-app-layout>
        </div>
    </nav>
    {{-- Navbar End --}}

    <div class="error">
        {{-- Validation Error Message --}}
        @if ($errors->any())
        <div class="alert w-50 alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
        @endif

        @if(Session::has('success'))
        <div class="alert w-50 alert-success alert-dismissible fade show" role="alert">
            {{Session::get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>

        @elseif(Session::has('error'))
        <div class="alert w-50 alert-danger alert-dismissible fade show" role="alert">
            {{Session::get('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
        @endif
    </div>

    <div class="container ">

        <div class="row justify-content-md-center">

            <div class="col-6">
                <div class=" mx-auto border border-dark mt-5 p-4 rounded text-center">
                    <a href="{{ url()->previous() }}" class="btn btn-info float-end">Back</a>
                    <div class="mb-4">
                        <span class="heading">Add Employee</span>
                    </div>
                    <form class="row mt-3" method="POST" action="{{url('updateEmployee/'.$data->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="col-6 mb-3">
                            <input type="text" name="empl_name" class="form-control" placeholder="Employee Name"
                                value="{{$data ->empl_name}}">
                        </div>
                        <div class="col-6 mb-3">
                            <input type="text" name="father_name" class="form-control" placeholder="Father Name"
                                value="{{$data->father_name}}">
                        </div>
                        <div class="col-6 mb-3">
                            <input type="text" name="emp_number" class="form-control" placeholder="Number"
                                value="{{$data->emp_number}}">
                        </div>
                        <div class="col-6 mb-3">
                            <input type="text" name="pf" class="form-control" placeholder="PF Number"
                                value="{{$data->pf}}">
                        </div>
                        <div class="col-6 mb-3">
                            <input type="text" name="esic" class="form-control" placeholder="ESIC"
                                value="{{$data->esic}}">
                        </div>
                        <div class="col-6 mb-3">
                            <input type="text" name="aadhar" class="form-control" placeholder="Addhaar"
                                value="{{$data->aadhar}}">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="date" class="form-label">Date of Joining</label>
                            <input type="date" name="date_of_joining" class="form-control"
                                value="{{$data->date_of_joining}}">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="date" class="form-label">Date of Resign</label>
                            <input type="date" name="date_of_resign" class="form-control" placeholder="Date"
                                value="{{$data->date_of_resign}}">
                        </div>

                        <div class="col-12 d-grid">
                            <br>
                            <button type="submit" class="btn btn-lg btn-warning mb-3">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>