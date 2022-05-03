<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<h2>User Login Form</h2>
<form action="{{route('user.Handlelogin')}}" method="post">
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