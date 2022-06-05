<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(Session::has('feedback_created'))
        <p>{{Session::get('feedback_created')}}</p>
    @endif
    @if($student)
    <h2>Send Feedback To Student:</h2>
    @else
    <h2>Send Feedback To School:</h2>
    @endif
    @if($student)
        <form action="{{route('feedback.storeschoolfeedback',['id'=>$student])}}" method="post">
    @else
        <form action="{{route('feedback.storeparentsfeedback')}}" method="post">
    @endif
        @csrf
        <input type="submit" value="Send Feedback"><br>
        @error('content') <span style="color: red;">{{ $message }}</span><br> @enderror
        <textarea name="content" id="" cols="30" rows="10"></textarea>
    </form>
    
</body>
</html>