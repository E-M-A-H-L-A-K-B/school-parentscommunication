<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<h2>Students Login Form</h2>
<form action="{{route('user.Handlelogin')}}" method="post">
    @csrf
    Name: <input type="text" name="name"><br>
    Last Name: <input type="text" name="last_name"><br>
    Father: <input type="text" name="father"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
    
</body>
</html>