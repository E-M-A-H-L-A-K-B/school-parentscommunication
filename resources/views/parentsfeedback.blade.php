<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Parents Feedback</h2>
    @foreach($feedbacks as $feedback)
        <p>--Parents Of {{$feedback->student->name}} {{$feedback->student->father}} {{$feedback->student->last_name}} From Class {{$feedback->section->SClass->num}} Section {{$feedback->section->num}}:</p>
            <p>{{$feedback->content}}</p>
           <p>--{{$feedback->created_at}}</p>
        <hr>
    @endforeach
</body>
</html>