<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <title>Crud Operation</title>

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

        .v {
            text-align: center;
        }
    </style>

</head>

<body>
    <h1 class="h1">Insert Book Data</h1>
    <div class="row">
        <div class="offset-lg-3 col-lg-6">
            <form class="container" method="post" action="booksubmit" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-title"></div>
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Title</label><br />



                                    <input type="text" name="title" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Author</label><br />



                                    <input type="text" name="author" required class="form-control" />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label><br />

                                    <input type="text" name="description" required class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Quantity</label><br />
                                    <input type="number" name="quantity" required class="form-control" />
                                </div>
                            </div>
                            {{-- <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Barcode</label><br />
                                    <input type="text" name="barcode" maxlength="10" required
                                        class="barcode form-control" />
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Profile Image</label><br />
                                    <input type="file" name="image" required class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select id="category" name="category" class="form-control v">
                                        <option>--Choose Category--</option>
                                        <option>Adventure stories</option>
                                        <option>Classics</option>
                                        <option>Crime</option>
                                        <option>Fantasy</option>
                                        <option>Horror</option>
                                        <option>Historical fiction</option>
                                        <option>Humour and Satire</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-success" />&nbsp;<a href="bookview"
                                    class="btn btn-outline-warning">Back</a>
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