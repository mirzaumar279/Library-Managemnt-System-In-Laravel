<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    .h {
        background-color: blue;
        width: 100%;
        text-align: center;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-weight: 30px;
        color: white;
    }

    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #04AA6D;
        color: white;
    }

    a:link {
        text-decoration: none;
    }

    a {
        color: white;
    }

    .kk {
        background-color: rgb(0, 0, 63);
        font-size: large;
        font-family: Georgia;
    }

    .search {
        width: 500px;
        height: 45px;
        text-align: center;
        font-size: 25px;
        font-family: Georgia;
        border-radius: 10px;
    }

    .im {
        border: 2px solid orange;
        border-radius: 5px;
    }
</style>

<body>
    <h1 class="h">Issue Data</h1>
    {{-- <form class="col-9">
        <div class="form-group">
            <input type="search" name="search" placeholder="Search by Title & Author" value="{{ $search }}"
                class="search" />

            <button class="btn btn-outline-primary">
                Search
            </button>
            <a href="{{ url('bookview') }}">
                <button class="btn btn-outline-success" type="button">
                    Reset
                </button>
            </a>
        </div>
    </form> --}}

    @if (session()->has('msgg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('msgg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session()->has('msggg'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('msggg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session()->has('msgggg'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('msgggg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form>
        <table id="customers">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Book Image</th>
                    <th>User Name</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($showArr as $show)
                    <tr>
                        <td>{{ $show->id }}</td>
                        <td>{{ $show->title }}</td>
                        <td><img class="im" src="{{ asset('uploads/issueimage/' . $show->image) }}" width="100px"
                                height="150px" alt="image"></td>
                        <td>{{ $show->name }}</td>
                        <td>{{ $show->status }}</td>
                        <td>{{ $show->start }}</td>
                        <td>{{ $show->end }}</td>
                        <td>

                            @if ($show->status == 'Given')
                                <a href="edit/{{ $show->id }}" class="btn btn-outline-success">Return</a>
                            @elseif($show->status == 'Return')
                            @endif


                            @if ($show->status == 'Return')
                                <a href="delete/{{ $show->id }}" class="btn btn-outline-danger">Delete</a>
                            @elseif($show->status == 'Given')
                            @endif

                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td class="kk" colspan="8"><a href="add">Add Issue</a></td>
                </tr>
            </tbody>
        </table>
    </form>
    <a href="dashboard" class="btn btn-outline-warning">Back</a>
</body>

</html>
