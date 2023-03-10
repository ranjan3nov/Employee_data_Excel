<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    {{-- Data Tables --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
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
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{url('/addEmployee')}}">Add Employee</a>
                    </li>
                </ul>
            </div>
            <x-app-layout>
            </x-app-layout>
        </div>
    </nav>
    {{-- Navbar End --}}
    <div class="error">

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

    <div class="container mt-3 mb-4 p-2 border rounded border-dark text-center">

        <span class=" heading text-center mt-2">Search Employee</span>

        <div class="container table-responsive">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Number</th>
                        <th>Joining</th>
                        <th>Resgin</th>
                        <th>PF</th>
                        <th>ESIC</th>
                        <th>Addhaar</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$row->empl_name}}</td>
                        <td>{{$row->father_name}}</td>
                        <td>{{$row->emp_number}}</td>
                        <td>{{$row->date_of_joining}}</td>
                        <td>{{$row->date_of_resign}}</td>
                        <td>{{$row->pf}}</td>
                        <td>{{$row->esic}}</td>
                        <td>{{$row->aadhar}}</td>
                        <td>
                            <a href="{{url('/editEmployee/'.$row->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{url('/deleteEmployee/'.$row->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Employee will be permanently Deleted')"
                                    class="btn btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

</body>

</html>