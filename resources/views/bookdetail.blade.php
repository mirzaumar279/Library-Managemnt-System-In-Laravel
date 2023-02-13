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
        .im
        {
            border: 5px solid orange;
            border-radius: 5px;
        }
        .kkl
        {
            margin-left: 400px;
        }
        .kkll
        {
            margin-left: 500px;
        }
    </style>
</head>

<body>
    <h1 class="h1">Book Details</h1>
    <div class="container">
        <div class="card row">
           
            <div class="card-body">
            <img class="im kkl" src="{{ asset('uploads/bookimage/' . $bookArr->image) }}" width="250px" height="350px"
                alt="image">
                <br><br>
                
            <h2 class="kkl"><b>{{ $bookArr->title }}</b> ({{ $bookArr->id }})</h2>
            @php
                $generate = new Picqer\Barcode\BarcodeGeneratorHTML();
                
            @endphp
            <h3 class="kkl">Book Details</h3>
            <h5 class="kkl">Author is : {{ $bookArr->author }}</h5>
            <h5 class="kkl">Description is : {{ $bookArr->description }}</h5>
            <h5 class="kkl">Category is : {{ $bookArr->category }}</h5>
            <h5 class="kkl">{!! $generate->getBarcode("$bookArr->title", $generate::TYPE_CODE_128) !!}
                {{-- P-{{ $bookArr->barcode }} --}}
            </h5>
            </div>
        
        </div>
        </div>
        <br />
        <a href="{{ url('bookview') }}">
            <button class="btn btn-outline-warning kkll" type="button">
                Back
            </button>
        </a>

    </div>
    </div>
</body>

</html>
