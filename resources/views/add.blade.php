<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <title>laravel</title>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .h1 {
            background-color: rgb(0, 0, 88);
            width: 100%;
            font-size: 30px;
            font-family: Georgia;
            text-align: center;
            font-weight: bold;
            color: white;
        }

        a:link {
            text-decoration: none;
        }

        a {
            color: black;
        }

        .kk {
            background-color: rgb(0, 0, 63);
            font-size: large;
            font-family: Georgia;
        }

        .margin {
            margin-left: 20px;
        }
    </style>

</head>

<body>
    <h1 class="h1">Insert Issue Data</h1>
    <div class="row">
        <div class="offset-lg-3 col-lg-6">


            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            @if (session()->has('msg'))
                <div class="alert alert-danger" role="alert">
                    {{ session('msg') }}
                </div>
            @elseif (session()->has('msggggg'))
                <div class="alert alert-warning" role="alert">
                    {{ session('msggggg') }}
                </div>
            @elseif (session()->has('a'))
                <div class="alert alert-primary" role="alert">
                    {{ session('a') }}
                </div>
            @endif
            <form class="container" method="post" action="submit" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-title"></div>
                    <div class="card-body">
                        <div class="row">
                            @csrf

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select id="name" name="user_id" class="form-control v">

                                        <option>--Choose User Name--</option>

                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select id="title" name="book_id" class="form-control v">

                                        <option>--Choose Book Name--</option>

                                        @foreach ($book as $books)
                                            <option value="{{ $books->id }}">
                                                {{ $books->title }}&nbsp;({{ $books->quantity }})</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <label class="margin">From</label>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="date" name="start" class="form-control " />
                                </div>
                            </div>
                            <label class="margin">To</label>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="date" name="end" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Profile Image</label><br />
                                    <input type="file" name="image" required class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-success" />&nbsp; <a href="view"
                                    class="btn btn-outline-warning">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>

</html>
