<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Grades For Student {{Auth::guard('student')->user()->name}} {{Auth::guard('student')->user()->father}} {{Auth::guard('student')->user()->last_name}}</h2>

    <table>
        <tr><th>Subject</th><th>Grade</th></tr>
        @foreach($grades as $grade)
            <tr><td>{{$grade->subject->name}}</td><td>{{$grade->number}}</td></tr>
        @endforeach
    </table>
</body>
</html>