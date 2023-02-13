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
    <h1 class="h1">Edit Book Data</h1>
    <div class="row">
        <div class="offset-lg-3 col-lg-6">
            <form method="post" action="../bookupdate/{{ $bookArr->id }}" class="container"
                enctype="multipart/form-data">
                <div class="card">
                    <div class="card-title"></div>
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Title</label><br />
                                    <input type="text" name="title" class="form-control"
                                        value="{{ $bookArr->title }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Author</label><br />
                                    <input type="text" name="author" required class="form-control"
                                        value="{{ $bookArr->author }}" />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label><br />
                                    <input type="text" name="description" required class="form-control"
                                        value="{{ $bookArr->description }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Quantity</label><br />
                                    <input type="number" name="quantity" required class="form-control"
                                        value="{{ $bookArr->quantity }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Category</label><br />
                                    <input type="text" name="category" required class="form-control"
                                        value="{{ $bookArr->category }}" />
                                </div>
                            </div>
                            {{-- <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Barcode</label><br />
                                    <input type="text" name="barcode" maxlength="10" required
                                        class="barcode form-control"  value="{{ $bookArr->barcode}}"/>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Profile Image</label><br />
                                    <input type="file" name="image" required class="form-control"
                                        value="{{ $bookArr->image }}" />
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-success" />
                                &nbsp;
                                <a href="{{ url('bookview') }}">
                                    <button class="btn btn-outline-warning" type="button">
                                        Back
                                    </button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.barcode').inputmask('9999999999');
        });
    </script>
</body>

</html>
