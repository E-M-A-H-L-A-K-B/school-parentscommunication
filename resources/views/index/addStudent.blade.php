<html lang="en ">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="URL::asset('css/bootstrap.min.css')}}">
  <link href="URL::asset('css/all.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="URL::asset('css/addS.css')}}">
  <title>addStudent</title>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
  <a href="structuremain.html"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>

  <div class="container">
    <div id="logo">
      <img src="URL::asset('img/logo_fixed.png')}}">
    </div>
    <div class="row">

      <div id="icon" class=" col-lg-6 clo col-md-6 clo col-sm-12 col-xs-12">
        <i class="fas fa-user-cog"></i>
        <h1>Admin</h1>
      </div>
      <div class=" col-lg-6  clo col-d-6 clo col-sm-12 col-xs-12">
        <div id="accordion">

          <a class="card-link" data-toggle="collapse" href="#collapseOne">
            <i class="fas fa-user-plus"></i>Add Student
          </a>
        </div>
        <form action="{{route('student.register')}}" method="POST">
          @csrf
          <div class="form-row">
            <div class="inputBox col-md-4 mb-2">
              <label id="labelname">First name</label>
              <input name="name" type="text" maxlength="10" class="inputt" autofocus placeholder="First name" required>
              @error('name')<span><small style="color: red;">{{ $message }} </small></span>@enderror
            </div>
           
            <div class="inputBox col-md-4 mb-2">
              <label id="labelname">Last name</label>
              <input name="last_name" type="text" maxlength="10" class="inputt" placeholder="Last name" required>
              @error('last_name')<span><small style="color: red;">{{ $message }} </small></span>@enderror
            </div>
            
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Father</span>
              </div>
              <input name="father" type="text" maxlength="10" placeholder="Father's Name" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              @error('father_name')<span><small style="color: red;">{{ $message }} </small></span>@enderror
            </div>

            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Mother</span>
              </div>
              <input name="mother_name" type="text" maxlength="10" required placeholder="Mother's Name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              @error('mother_name')<span><small style="color: red;">{{ $message }} </small></span>@enderror
            </div>

            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-user-circle"></i></span>
              </div>
              <input name="national_number" type="text" maxlength="10" placeholder="National Id" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              @error('national_number')<span><small style="color: red;">{{ $message }} </small></span>@enderror
              @if(Session::has('national_number_exist'))
              <span><small style="color: red;">{{ Session::get('national_number_exist') }}</small></span><br>
              @endif
              @if(Session::has('national_number_error'))
              <span><small style="color: red;">{{ Session::get('national_number_error') }}</small></span><br>
              @endif
              @if(Session::has('national_number_size_error'))
              <span><small style="color: red;">{{ Session::get('national_number_size_error') }}</small></span><br>
              @endif
            </div>

            <div class="form-row align-items-center">
              <div class="col-auto my-1">
                <label id="gender" class="mr-sm-2" for="inlineFormCustomSelect"><i class="fas fa-chalkboard"></i>Class</label>
                <select required name="class_number" class="custom-select mr-sm-2"  id="inlineFormCustomSelect">
                  @foreach($classes as $class)
                  <option value="{{$class->num}}" >Class {{$class->num}}</option>
                  @endforeach
                </select>
                @error('class_number')<span><small style="color: red;">{{ $message }} </small></span>@enderror
                @if(Session::has('number_error'))
                <span><small style="color: red;">{{ Session::get('number_error') }}</small></span>
                @endif
              </div>


              <div class="input-group mb-2">
                <input name="date_of_birth" id="data" type="date" aria-required="true" class="form-control" value="dd-mm-yyyy" required>
                @error('date_of_birth')<span><small style="color: red;">{{ $message }} </small></span>@enderror
              </div><br />

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <input name="place_of_birth" type="text" maxlength="25" required placeholder="Place Of Birth" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                @error('place_of_birth')<span><small style="color: red;">{{ $message }} </small></span>@enderror
              </div>

              @if(Session::has('student_success'))
                  <span><small style="color: green;">{{Session::get('student_success')}}</small></span>
              @endif
          
              @if(Session::has('student_exists'))
                  <span><small style="color: red;">{{Session::get('student_exists')}}</small></span>
              @endif
          
              @if(Session::has('date_error'))
                  <span><small style="color: red;">{{Session::get('date_error')}}</small></span>
              @endif
              <label class="validation-error hide" id="fullNameValidationError"></label>
              <input id="submit" class="btn btn-primary" type="submit" value="Register">
            </div>
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