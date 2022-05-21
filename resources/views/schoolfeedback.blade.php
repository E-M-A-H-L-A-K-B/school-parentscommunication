<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>School Feedback</h2>
    @foreach($feedbacks as $feedback)
        @php
            if($feedback->subject != null)
            {
                $subject = "مدرس مادة ".$feedback->subject->name;
            }
            else
            {
                $subject = "موجه الشعبة";
            }
        @endphp
        <p>--{{$feedback->user->name}} {{$feedback->user->father}} {{$feedback->user->last_name}} {{$subject}}:</p>
            <p>{{$feedback->content}}</p>
           <p>--{{$feedback->created_at}}</p>
           <hr>
    @endforeach
</body>
</html>