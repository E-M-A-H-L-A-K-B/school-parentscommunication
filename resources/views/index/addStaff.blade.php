<html lang="en ">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
  <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{URL::asset('css/addS.css')}}">
  <title>addStaff</title>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
  <a href="{{route('adminmain')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
  <div class="container">
    <div id="logo">
      <img src="{{URL::asset('img/logo_fixed.png')}}">
    </div>
    <div class="row">
      <div id="icon" class=" col-lg-6 clo col-md-6 clo col-sm-12 col-xs-12">
        <i class="fas fa-user-cog"></i>
        <h1>Admin</h1>
      </div>
      <div class=" col-lg-6  clo col-d-6 clo col-sm-12 col-xs-12">
        <div id="accordion">

          <a class="card-link" data-toggle="collapse" href="#collapseOne">
            <i class="fas fa-user-plus"></i>Add Staff
          </a>
        </div>
        <form action="{{route('user.register')}}" method="POST">
          @csrf
          <div class="form-row">
            <div class="inputBox col-md-4 mb-2">
              <label id="labelname">First name</label>
              <input name="user_name" type="text" maxlength="10" class="inputt" autofocus placeholder="First name" required>
              @error('user_name')<span><small style="color: red;">{{ $message }} </small></span>@enderror
            </div>
            
            <div class="inputBox col-md-4 mb-2">
              <label id="labelname">Last name</label>
              <input name="user_last_name" type="text" maxlength="10" class="inputt" placeholder="Last name" required>
              @error('user_last_name')<span><small style="color: red;">{{ $message }} </small></span>@enderror
            </div>
            
            <div class="input-group mb-2 ff">
              <div class="input-group-prepend ">
                <span class="input-group-text" id="inputGroup-sizing-default">Father</span>
              </div>
              <input name="user_father_name" type="text" required maxlength="20" placeholder="Father's Name" class="fs">
              @error('user_father_name')<span><small style="color: red;">{{ $message }} </small></span>@enderror
            </div>

            <fieldset class="form-group ff">
              <div aria-required="true" class="row">
                <label id="Role"><i class="fas fa-user-check"></i>Role</label>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" maxlength="20" type="radio" name="role" id="gridRadios1" value="1">
                    <label type="radio" name="role" id="Role" class="form-check-label" for="gridRadios1">
                      Teacher
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" maxlength="20" type="radio" name="role" id="gridRadios2" value="2">
                    <label type="radio" name="role" id="Role" class="form-check-label" for="gridRadios2">
                      Guide
                    </label>
                  </div>
                </div>
              </div>
              @error('role')<span><small style="color: red;">{{ $message }} </small></span>@enderror
            </fieldset>
            @if(Session::has('user_success'))
                <span><small style="color: green;">{{Session::get('user_success')}}</small></span>
            @endif

            @if(Session::has('user_exists'))
                <span><small style="color: red;">{{Session::get('user_exists')}}</small></span>
            @endif
            <label class="validation-error hide" id="fullNameValidationError"></label>
            <input id="submit" class="btn btn-primary" type="submit" value="Register">
          </div>
        </form>
      </div>
    </div>
  </div>

  
  <script src="{{URL::asset('js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>

  <script src="{{URL::asset('js/addSU.js')}}"></script>
</body>


</html>