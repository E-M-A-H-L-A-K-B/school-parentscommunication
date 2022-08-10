<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/change.css')}}">
    <title>change</title>
</head>

<body>
    <a href="#"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <div class="container">
        <div id="logo">
            <img src="{{URL::asset('img/logo_fixed.png')}}">
        </div>
    </div>

    <h1>Change Password</h1>

    <div class="box">

        @if(Session::has('error'))
        <p style="color: red;">{{ Session::get('error') }}</p>
        @endif

        @if(Auth::guard('student')->check())
        <h2>Student Password Change Form</h2>
        <form action="{{route('student.handlechangepassword')}}" method="post">
        @elseif(Auth::check() && Auth::user()->admin)
        <h2>Admin Password Change Form</h2>
        <form action="{{route('user.handleadminchangepassword')}}" method="post">
        @elseif(Auth::check() && !Auth::user()->admin)
        <h2>Staff Password Change Form</h2>
        <form action="{{route('user.handlechangepassword')}}" method="post">
        @endif
        @csrf
                <div class="inputBox">
                    <span onclick="eyedisplay()">
                        <i id="hide1" class="fas fa-eye"></i>
                        <i id="hide2" class="fas fa-eye-slash"></i>
                    </span>
                    <label>Old Password</label>
                    <input type="password" class="inputt" name="oldpass" id="myinput" required placeholder="Old Password"
                        maxlength="15">
                        @error('oldpass')<span><small style="color: red;">{{ $message }}</small></span> @enderror
                </div>

                <div class="inputBox">
                    <span onclick="ueyedisplay()">
                        <i id="uhide1" class="fas fa-eye"></i>
                        <i id="uhide2" class="fas fa-eye-slash"></i>
                    </span>
                    <label>New Password</label>
                    <input name="newpass" type="password" class="inputt" id="umyinput" required placeholder="New Password"
                        maxlength="15">
                        @error('newpass')<span><small style="color: red;">{{ $message }}</small></span> @enderror

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
                </div>

                @if(Auth::check())
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                @elseif(Auth::guard('student')->check())
                <input type="hidden" name="id" value="{{Auth::guard('student')->user()->id}}">
                @endif
                <input type="submit" value="Change">
            </form>

    </div>

    <script>

        function eyedisplay() {
            var i = document.getElementById('myinput');
            var eye = document.getElementById('hide1');
            var eyeslash = document.getElementById('hide2');
            if (i.type == "password") {
                i.type = 'text';
                eye.style.display = 'block';
                eyeslash.style.display = 'none';
            }
            else {
                i.type = "password";
                eye.style.display = 'none';
                eyeslash.style.display = 'block';
            }
        }

        function ueyedisplay() {
            var i = document.getElementById('umyinput');
            var eye = document.getElementById('uhide1');
            var eyeslash = document.getElementById('uhide2');
            if (i.type == "password") {
                i.type = 'text';
                eye.style.display = 'block';
                eyeslash.style.display = 'none';
            }
            else {
                i.type = "password";
                eye.style.display = 'none';
                eyeslash.style.display = 'block';
            }
        }
    </script>
</body>

</html>