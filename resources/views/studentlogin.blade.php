<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @if(Session::has('error'))
        <p style="color:red">{{ Session::get('error') }}</p>
    @endif

    @if(Session::has('protection'))
        <p style="color: red;">{{Session::get('protection')}}</p>
    @endif

<h2>Students Login Form</h2>
<form action="{{route('student.Handlelogin')}}" method="post">
    @csrf
    Name: <input type="text" name="name"><br>
    <span><small style="color: red;">@error('name'){{ $message }}@enderror <br></small></span>
    Last Name: <input type="text" name="last_name"><br>
    <span><small style="color: red;">@error('last_name'){{ $message }}@enderror <br></small></span>
    Father: <input type="text" name="father"><br>
    <span><small style="color: red;">@error('father'){{ $message }}@enderror <br></small></span>
    Password: <input type="password" name="password"><br>
    <span><small style="color: red;">@error('password'){{ $message }}@enderror <br></small></span>
    <input type="submit" value="Login">
</form>
    
</body>
</html>