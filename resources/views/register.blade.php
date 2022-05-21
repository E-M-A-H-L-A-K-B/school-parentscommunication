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
    
    @if(Auth::guard('student')->check())
        <p style="color:blueviolet"> Hello Student : {{ Auth::guard('student')->user()->name }} {{Auth::guard('student')->user()->father}} {{ Auth::guard('student')->user()->last_name }}</p>
        <p><a href="{{route('student.logout')}}">logout</a></p>
        <p><a href="{{route('student.changepassword')}}">Change Password</a></p>
        <p><a href="{{route('announcements.sections',['id'=>Auth::guard('student')->user()->section_id])}}">View Section Announcement</a></p>
        <p><a href="{{route('feedback.viewschool')}}">View School Feedback</a></p>
        <p><a href="{{route('feedback.parentfeedback')}}">Send Feedback</a></p>
    @endif

    @if(Auth::check())
        @if(Auth::user()->admin)
        <p style="color:blue"> Hello Admin : {{ Auth::user()->name }} {{Auth::user()->father}} {{ Auth::user()->last_name }}</p>
        <p><a href="{{route('user.logout')}}">logout</a></p>
        <p><a href="{{route('user.changepassword')}}">Change Password</a></p>
        <p><a href="{{route('structure.main')}}">Go To Structure</a></p>
        <p><a href="{{route('announcements.addschool')}}">Add School Announcement</a></p>
        @endif
        @if(!Auth::user()->admin)
        <p style="color:blue"> Hello Professor : {{ Auth::user()->name }} {{Auth::user()->father}} {{ Auth::user()->last_name }}</p>
        <p><a href="{{route('user.logout')}}">logout</a></p>
        <p><a href="{{route('user.changepassword')}}">Change Password</a></p>
        <p><a href="{{route('sections.view')}}">View Sections</a></p>
        @endif
        @if(Auth::user()->guide)
            <p><a href="{{route('feedback.viewparents')}}">view Parents Feedback</a></p>
        @endif
        <p><a href="{{route('feedback.students')}}">View Students</a></p>
    @endif
    <p><a href="{{route('announcements.school')}}">View School Announcments</a></p>

    @if(Session::has('change_success'))
        <p style="color: green;">{{Session::get('change_success')}}</p>
    @endif

    @if(Session::has('protection'))
        <p style="color: red;">{{Session::get('protection')}}</p>
    @endif

    <p> Enter The Student login test: <a href="{{route('student.login')}}">login test</a></p>
    <p> Enter The User login test: <a href="{{route('user.login')}}">login test</a></p>

    @if(Session::has('user_success'))
        <p style="color: green;">{{Session::get('user_success')}}</p>
    @endif

    @if(Session::has('user_exists'))
        <p style="color: red;">{{Session::get('user_exists')}}</p>
    @endif
    <h2>User Register Form</h2>
    <form action="{{route('user.register')}}" method="post">
        @csrf
        Name: <input type="text" name='name' ><br>
        <span><small style="color: red;">@error('name'){{ $message }}@enderror <br></small></span>
        Last Name: <input type="text" name='last_name' ><br>
        <span><small style="color: red;">@error('last_name'){{ $message }}@enderror <br></small></span>
        Father's Name: <input type="text" name="father" ><br>
        <span><small style="color: red;">@error('father'){{ $message }}@enderror <br></small></span>
        Role: 
        <label for="teacher">Teacher <input type="radio" name="role" id="teacher" value='1' ></label> 
        <label for="guide">Guide <input type="radio" name="role" id="guide" value="2" ></label> <br>
        <span><small style="color: red;">@error('role'){{ $message }}@enderror <br></small></span>
        <input type="submit" value="Register">
    </form>

    @if(Session::has('student_success'))
        <p style="color: green;">{{Session::get('student_success')}}</p>
    @endif

    @if(Session::has('student_exists'))
        <p style="color: red;">{{Session::get('student_exists')}}</p>
    @endif

    <h2>Student Register Form</h2>
    <form action="{{route('student.register')}}" method="post">
        @csrf
        Name: <input type="text" name='name' ><br>
        <span><small style="color: red;">@error('name'){{ $message }}@enderror <br></small></span>
        Last Name: <input type="text" name='last_name' ><br>
        <span><small style="color: red;">@error('last_name'){{ $message }}@enderror <br></small></span>
        Father's Name: <input type="text" name="father" ><br>
        <span><small style="color: red;">@error('father'){{ $message }}@enderror <br></small></span>
        Mother's Name: <input type="text" name="mother_name" ><br>
        <span><small style="color: red;">@error('mother_name'){{ $message }}@enderror <br></small></span>
        National Number: <input type="text" name="national_number" ><br>
        <span><small style="color: red;">@error('national_number'){{ $message }}@enderror <br></small></span>
        Class: <input type="number" name="class_number" min='1' max='12'><br>
        <span><small style="color: red;">@error('class_number'){{ $message }}@enderror <br></small></span>
        Date Of Birth: <input type="date" name="date_of_birth" ><br>
        <span><small style="color: red;">@error('date_of_birth'){{ $message }}@enderror <br></small></span>
        Place Of Birth: <input type="text" name="place_of_birth" ><br>
        <span><small style="color: red;">@error('place_of_birth'){{ $message }}@enderror <br></small></span>
        <input type="submit" value="Register">
    </form>

</body>
</html>