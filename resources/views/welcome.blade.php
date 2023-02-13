<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .h1 {
            background-color: rgb(0, 0, 68);
            width: 100%;
            text-align: center;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-weight: 30px;
            color: white;
        }

        a:link {
            text-decoration: none;
           
        }

		.m1{
			background-image: url("https://cdn.pixabay.com/photo/2016/06/01/06/26/open-book-1428428__340.jpg");
			background-repeat: no-repeat;
			width: 30%;
            margin-top: 50px;
			height: 316px;
			border: 4px solid white;
			margin-left: 430px;
			box-shadow: 1px 2px 15px 6px black;
			animation: slider 15s infinite linear;
		}
		@keyframes slider
		{
			0%{background-image: url("https://cdn.pixabay.com/photo/2016/06/01/06/26/open-book-1428428__340.jpg");}
			35%{background-image: url("https://cdn.pixabay.com/photo/2015/11/19/21/11/book-1052014__340.jpg");}
			75%{background-image: url("https://cdn.pixabay.com/photo/2023/01/15/16/20/library-7720589__340.jpg");}
		}
        .left
        {
            margin-left: 450px;
        }      
    </style>
</head>

<body>
    <h1 class="h1">Liberary Managemenet System</h1>
    <div class="m1"></div>
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
        </div>
        <br><br>
        <div class="row left">
            <div class="col">
                @if (Route::has('login'))

                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-warning">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Log In</a>
                        &nbsp;
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                        @endif
                    @endauth

                @endif
            </div>
        </div>
    </div>
</body>

</html>
