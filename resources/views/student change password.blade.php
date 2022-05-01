<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @if(Session::has('error'))
        <p style="color: red;">{{Session::get('error')}}</p>
    @endif
    <h2>Student Password Change Form:</h2>
    <form action="{{route('student.handlechangepassword')}}" method="post">
        @csrf
        Old Password: <input type="password" name="oldpass"><br>
        New Password: <input type="password" name="newpass"><br>
        <input type="hidden" name="id" value="{{Auth::guard('student')->user()->id}}">
        <input type="submit" value="Change">
    </form>
    
</body>
</html>