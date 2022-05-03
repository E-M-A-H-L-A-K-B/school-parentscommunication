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
        <p style="color: red;">{{ Session::get('error') }}</p>
    @endif

    @if(!Auth::user()->admin)
    <h2>User Password Change Form:</h2>
    <form action="{{route('user.handlechangepassword')}}" method="post">
    @else
    <h2>Admin Password Change Form:</h2>
    <form action="{{route('user.handleadminchangepassword')}}" method="post">
    @endif
        @csrf
        Old Password: <input type="password" name="oldpass"><br>
        <span><small style="color: red;">@error('oldpass'){{ $message }}@enderror <br></small></span>
        New Password: <input type="password" name="newpass"><br>
        @error('newpass')<span><small style="color: red;">{{ $message }} <br></small></span>@enderror
        @if(Session::has('mintest_error'))
        <span><small style="color: red;">{{ Session::get('mintest_error') }} <br></small></span>
        @endif
        @if(Session::has('capitaltest_error'))
        <span><small style="color: red;">{{ Session::get('capitaltest_error') }} <br></small></span>
        @endif
        @if(Session::has('numtest_error'))
        <span><small style="color: red;">{{ Session::get('numtest_error') }} <br></small></span>
        @endif
        @if(Session::has('specialtest_error'))
        <span><small style="color: red;">{{ Session::get('specialtest_error') }} <br></small></span>
        @endif
        <input type="hidden" name="id" value="{{Auth::user()->id}}">
        <input type="submit" value="Change">
    </form>
</body>
</html>