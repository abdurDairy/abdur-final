<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <form action="{{ route('result.show.index') }}" method="POST" class="col-lg-4 mt-5 mx-auto row">
        @csrf

        <select class="form-control mb-2" name="year">
            <option disabled selected>Select a Year</option>
            @foreach ($years as $year)

            <option value="{{ $year->id }}">{{ $year->passing_year  }}</option>
            @endforeach
        </select>
        <select class="form-control mb-2" name="semister">
            <option disabled selected>Select a 
                Semister
            </option>
            @foreach ($semisters as $semister)

            <option value="{{ $semister->id }}">{{ $semister->subject_name  }}</option>
            @endforeach
        </select>


        <button class="btn btn-primary mb-2">Get Result</button>



    </form>
</body>

</html>