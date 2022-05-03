<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>User Password Change Form:</h2>
    <form action="{{route('user.handlechangepassword')}}" method="post">
        @csrf
        Old Password: <input type="password" name="oldpass"><br>
        <span><small style="color: red;">@error('oldpass'){{ $message }}@enderror <br></small></span>
        New Password: <input type="password" name="newpass"><br>
        <span><small style="color: red;">@error('newpass'){{ $message }}@enderror <br></small></span>
        <input type="hidden" name="id" value="{{Auth::user()->id}}">
        <input type="submit" value="Change">
    </form>
</body>
</html>