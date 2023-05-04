<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>result</title>
</head>
<body>
    <div class="header text-center">
        <h4 style="text-align: center;">international islamic university chittagong</h4>
        <h4 style="text-align: center;">Department of ETE </h4> <hr>
        <h4 style="text-align: center; color:green;">RESULT</h4>
        <strong>Subject Name : <span>{{ $subject->subject_name  }}</span></strong> <br>
        <strong>Semester : {{ $semester->Semester  }}</strong> <br>
        <strong>{!! $resultPDF->result_details !!}</strong>
    </div>
</body>
</html>