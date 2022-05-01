<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    @if(Auth::guard('student')->check())
        <p style="color:blueviolet"> Hello Student : {{ Auth::guard('student')->user()->name }} {{Auth::guard('student')->user()->father}} {{ Auth::guard('student')->user()->last_name }}</p>
        <p><a href="{{route('student.logout')}}">logout</a></p>
        <p><a href="{{route('student.changepassword')}}">Change Password</a></p>
    @endif

    @if(Auth::check())
        <p style="color:blue"> Hello Professor : {{ Auth::user()->name }} {{Auth::user()->father}} {{ Auth::user()->last_name }}</p>
        <p><a href="{{route('user.logout')}}">logout</a></p>
        <p><a href="{{route('user.changepassword')}}">Change Password</a></p>
    @endif

    @if(Session::has('change_success'))
        <p style="color: green;">{{Session::get('change_success')}}</p>
    @endif

    <p> Enter The Student login test: <a href="{{route('student.login')}}">login test</a></p>
    <p> Enter The User login test: <a href="{{route('user.login')}}">login test</a></p>

    @if(Session::has('user_success'))
        <p style="color: green;">{{Session::get('user_success')}}</p>
    @endif
    <h2>User Register Form</h2>
    <form action="{{route('user.register')}}" method="post">
        @csrf
        Name: <input type="text" name='name' required><br>
        Last Name: <input type="text" name='last_name' required><br>
        Father's Name: <input type="text" name="father" required><br>
        <input type="submit" value="Register">
    </form>

    @if(Session::has('student_success'))
        <p style="color: green;">{{Session::get('student_success')}}</p>
    @endif
    <h2>Student Register Form</h2>
    <form action="{{route('student.register')}}" method="post">
        @csrf
        Name: <input type="text" name='name' required><br>
        Last Name: <input type="text" name='last_name' required><br>
        Father's Name: <input type="text" name="father" required><br>
        <input type="submit" value="Register">
    </form>

</body>
</html>