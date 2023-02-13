<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    </style>
</head>

<body>
    <h1 class="h1">Edit Issue Data</h1>
    <div class="row">
        <div class="offset-lg-3 col-lg-6">
            <form method="post" action="../update/{{ $showArr->id }}" class="container">
                <div class="card">
                    <div class="card-title"></div>
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select id="status" name="status" class="form-control v">
                                        <option>--Choose Status--</option>
                                        <option>Return</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-outline-success" />
                                    &nbsp;
                                    <a href="/" class="btn btn-outline-warning">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</body>

</html>
