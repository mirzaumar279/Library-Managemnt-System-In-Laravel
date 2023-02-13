<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
    </style>
</head>

<body>
    <h1 class="h1">Edit User Data</h1>
    <div class="row">
        <div class="offset-lg-3 col-lg-6">
            <form method="post" action="../usersupdate/{{ $userArr->id }}" class="container">
                <div class="card">
                    <div class="card-title"></div>
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Name</label><br />

                                    <input type="text" name="name" required value="{{ $userArr->name }}"
                                        class="form-control" placeholder="Add only alphabets" pattern="^[A-Za-z]{3,10}$"
                                        maxlength="10" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Email</label><br />

                                    <input type="email" name="email" required value="{{ $userArr->email }}"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Address</label><br />

                                    <input type="text" name="address" required value="{{ $userArr->address }}"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Phone Number</label><br />

                                    <input type="text" name="phone" required value="{{ $userArr->phone }}"
                                        class="phone form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-outline-success" />
                                    &nbsp;
                                    <a href="{{ url('userview') }}">
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
            $('.phone').inputmask('+82-9999-99999');
        });
    </script>
</body>

</html>
