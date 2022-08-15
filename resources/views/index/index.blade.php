<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
  <link href="{{ URL::asset('css/all.min.css')}}" rel="stylesheet">
  <script src="{{ URL::asset('js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{ URL::asset('js/js.js')}}"></script>
  <link rel="stylesheet" href="{{ URL::asset('css/index.css')}}">
  <title>index</title>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

  <div id="close">
    <i class=" fas fa-window-close "></i>
  </div>


  <section id="home">
    <div id="logo">
      <img src="{{ URL::asset('img/logo_fixed.png')}}">
    </div>


    <nav class="menu">

      <div class="menu_btn ">
        <span class="fas fa-bars"></span>
      </div>

      <ul id="menu_list">
        <div id="list">
          <li>
            @if(Auth::check())
              @if(Auth::user()->admin)
                <a class="nav-link" href="{{route('adminmain')}}"><i id="iconbar" class="fas fa-user-circle"></i>Admin Panel</a>
                
              @elseif(Auth::user()->guide)
                <a class="nav-link" href="{{route('guidemain')}}"><i id="iconbar" class="fas fa-user-circle"></i>My Panel</a>
              @elseif(Auth::user()->teacher)
                <a class="nav-link" href="{{route('teachermain')}}"><i id="iconbar" class="fas fa-user-circle"></i>My Panel</a>
              @endif
              <a class="nav-link" href="{{route('user.changepassword')}}"><i id="iconbar" class="fas fa-user-circle"></i>Change Password</a>
            @elseif(Auth::guard('student')->check())
              <a class="nav-link" href="{{route('studentmain')}}"><i id="iconbar" class="fas fa-user-circle"></i>My Panel</a>
              <a class="nav-link" href="{{route('student.changepassword')}}"><i id="iconbar" class="fas fa-sign-out-alt"></i>Change Password</a>
            @endif
          </li>
          <li>
            <a class="nav-link" href="#home"><i id="iconbar" class="fas fa-home"></i>HOME</a>
          </li>
          <li>
            <a class="nav-link" href="#about"><i id="iconbar" class="fas fa-info-circle"></i>ABOUT US</a>
          </li>
          <li>
            <a class="nav-link" href="#Headteacher"><i id="iconbar" class="fas fa-users"></i>Headteacher</a>
          </li>
          <li>
            <a class="nav-link" href="#Adv"><i id="iconbar" class="fas fa-ad"></i>Advertisement</a>
          </li>
          <li>
            <a class="nav-link" href="#contactt"><i id="iconbar" class="fas fa-comments"></i>CONTACT</a>
          </li>
          @if(Auth::check() || Auth::guard('student')->check())
          <li>
            @if(Auth::check())
            <a class="nav-link" href="{{route('user.logout')}}"><i id="iconbar" class="fas fa-sign-out-alt"></i>Logout</a>

            @elseif(Auth::guard('student')->check())
            <a class="nav-link" href="{{route('student.logout')}}"><i id="iconbar" class="fas fa-sign-out-alt"></i>Logout</a>
            @endif
          </li>
          @endif
        </div>
      </ul>




    </nav>


    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        
        <div class="carousel-item active">
          <img class="photo w-100" src="{{URL::asset('img/Nailsea-School-2.jpg')}}" alt="First slide">
        </div>

        <div class="carousel-item">
          <img class="photo w-100" src="{{URL::asset('img/2429237300000578-2880555-image-a-19_1418993618094.jpg')}}" alt="Second slide">
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>


    <div>
      @if(!Auth::check() && !Auth::guard('student')->check())
      <button id="sigin" type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
        <i class="fas fa-sign-in-alt"></i>
      </button>
      @endif

      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <img src="{{URL::asset('img/small_2x_6deade1b-c4cf-4458-bb3e-9895a8fd6f6e.png')}}" alt="user" height="100" width="100">
            <div class="modal-header">
              <h4 class="modal-title">Login</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body login-page" id="login-form">
              <div class="form-box">
                <div class="button-box">
                  <div id="btn">
                    <a type="button" onclick="studentlogin()" id="parent" class="toggle-btn  ">
                      <h5 id="s" class="modal-title">
                        Student Login</h5>
                    </a>
                    <a type="button" onclick="userlogin()" id="teacher" class="toggle-btn ">
                      <h5 id="t" class="modal-title">
                        Staff Login </h5>
                    </a>


                    <form action="{{route('student.Handlelogin')}}" method="post" id="studentlogin" class="input-group-studentlogin">
                      @csrf
                      <div class="inputBox">
                        <input class="inputt" name="name" type="text" required placeholder="Student Name"
                          maxlength="25">
                      </div>
                      @error('name')<span><small style="color: red;">{{ $message }} <br></small></span>@enderror

                      <div class="inputBox">
                        <input class="inputt" name="last_name" type="text" required placeholder="Last Name "
                          maxlength="25">
                      </div>
                      @error('last_name')<span><small style="color: red;">{{ $message }} <br></small></span>@enderror
                      <div class="inputBox">

                        <input class="inputt" name="father" type="text" required placeholder="Father's Name"
                          maxlength="25">
                      </div>
                      @error('father')<span><small style="color: red;">{{ $message }} <br></small></span>@enderror
                      <div class="inputBox">
                        <span onclick="eyedisplay()">
                          <i id="hide1" class="fas fa-eye"></i>
                          <i id="hide2" class="fas fa-eye-slash"></i>
                        </span>
                        <input class="inputt" name="password" id="myinput" type="password" required
                          placeholder="Password" maxlength="15">

                      </div>
                      @error('password')<span><small style="color: red;">{{ $message }} <br></small></span>@enderror

                      <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input type="hidden" class="custom-control-input" id="customControlInline" name="remember_me" value="0"> 
                        <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember_me" value="1">
                        <label class="custom-control-label" for="customControlInline">Remember me </label>
                      </div>

                      <div class="modal-footer">
                        <button href="#" id="logbutton" class="btn btn-primary"> Login</button>
                      </div>
                    </form>
<div id="form2">
                    <form action="{{route('user.Handlelogin')}}" method="post" id="userlogin" class="input-group-userlogin">
                      @csrf
                      <div class="inputBox">
                        <input name="name" class="inputt" v type="text" required placeholder="User Name" maxlength="25">
                      </div>
                      @error('name')<span><small style="color: red;">{{ $message }} <br></small></span>@enderror
                      <div class="inputBox">
                        <input name="last_name" class="inputt" type="text" required placeholder="Last Name"
                          maxlength="25">
                      </div>
                      @error('last_name')<span><small style="color: red;">{{ $message }} <br></small></span>@enderror
                      <div class="inputBox">
                        <input name="father" class="inputt" type="text" required placeholder="Father's Name"
                          maxlength="25">
                      </div>
                      @error('father')<span><small style="color: red;">{{ $message }} <br></small></span>@enderror

                      <div class="inputBox">
                        <span onclick="ueyedisplay()">
                          <i id="uhide1" class="fas fa-eye"></i>
                          <i id="uhide2" class="fas fa-eye-slash"></i>
                        </span>
                        <input name="password" class="inputt" type="password" id="umyinput" required
                          placeholder="Password" maxlength="15">
                      </div>
                      @error('password')<span><small style="color: red;">{{ $message }} <br></small></span>@enderror
                      <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember_me" value="0">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember_me" value="1">
                        <label class="custom-control-label" for="customControlAutosizing">Remember me </label>
                      </div>
                      <div class="modal-footer">
                        <button href="#" id="logbutton" class="btn btn-primary"> Login</button>
                      </div>
                    </form>
</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="title_text">
      <p> Welcome To STUDENT TRAILING</p>
    </div>

    <div class="home_box">

      <p id="par">

      Student Trailing is an online platform that allow parents and schools to communicate a keep in
      touch with each other more effectivly through creating an account for the student so the parents
      can communicate with the school management, guids and teaching staff, and to send and
      recieve feedback from the school and check the school's different announcements as well as
      check on the student's grades in different subjects.
      </p>
      <p><small class="text-muted"> Thank you for your interest in our platform and we look forward to welcoming you.
          The Student Trailing team</small></p>

    </div>
  </section>

  <section id="about">
    <div class="title_text">
      <p>About Student Trailing</p>
    </div>
    <div class="about_box">
      <p id="par">

        This platform allows the director to create the school's structure from classes, sections,
        subjects, students, and faculty members and assign them according to his well, and allows
        the faculty members to rate the student in a simple, easy and fast way through writing their
        feedback to the parents of every student, guides can recieve feedback from parents and
        respond to them, as well as send announcements to the sections assigned to him, on the other
        hand, parents can view the faculty members responsible for their child's education, as well as
        check their marks, view school and section announcements and recieve feed back from the
        faculty members and respond to it.
      </p>
      <div class="about_imgss"><img src="{{URL::asset('img/Classroom-2.jpg')}}"></div>
      <div class="about_imgss"><img src="{{URL::asset('img/Science-Super-Laboratory-Room-2.jpg')}}"></div>
      <div class="about_imgss"><img src="{{URL::asset('img/music-3.jpg')}}"></div>
      <div class="about_imgss"><img src="{{URL::asset('img/Canteen-2 (1).jpg')}}"></div>

    </div>
  </section>

  <section id="Headteacher">
    <div class="title_text">
      <p>Our Goals</p>
    </div>
    <div class="Headteacher_box">
      <div class="card-group">

        <div class="card">
          <div class="card-body">
            <h4 class="card-title"></h4>
            <p class="card-text">
            To complete the educational process in the finest way through the educational cooperation
            of both parents and faculty members by securing a way of communication between them, to
            create a new generation with great capabilities and competencies in a convenient way for both
            parties.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="Adv">

    <div class="title_text">
      <p> Announcements</p>
    </div>
    <div id="Adv_box">

    @foreach($announs as $announ)
      <div class="row">
        <div class=" col-lg-6 clo col-md-6 clo col-sm-12 col-xs-12">
          <div class="jumbotron">
            <div class="content_ad">{{$announ->content}}</div>
            <hr class="my-4">
            <h2>{{$announ->created_at->format('d/M/Y H:i')}}</h2>
          </div>
        </div>
        <div class=" col-lg-6  clo col-d-6 clo col-sm-12 col-xs-12">
          <i  id="icon_ad" class="fas fa-bullhorn"></i>
        </div>
      </div>
    @endforeach

    </div>
  </section>
  <section id="contactt">

    <div class="title_text">
      <p> School Contact Details</p>
    </div>
    <div id="contactt_box">
      <p id="contact_title"><i class="fas fa-map-marked-alt"></i> Mizzymead Road,STUDENT TRAILING, Bristol, BS48 2HN</p>

      <table class="content-table" style="width:100%">
        <tbody>
          <tr>
            <td>School Receptio:</td>
            <td>01275852251</td>
          </tr>
          <tr>
            <td>Student Absence Line:</td>
            <td>01275850400</td>
          </tr>
          <tr>
            <td>School Fax Number:</td>
            <td>01275854512</td>
          </tr>
          <tr>
            <td>General Enquiries:</td>
            <td>info@nailseaschool.com</td>
          </tr>
        </tbody>
      </table>
      <p id="contact_title">Travelling to STUDENT TRAILING</p>
      <p id="contact_info"><i id="contact_icon" class="fas fa-train"></i><span id="contact_title_info">TRAIN:</span> The
        nearest station is Nailsea & Backwell. It is a 25 minute walk from the station to the school</p>
      <p id="contact_info"><i id="contact_icon" class="fas fa-bus-alt"></i><span id="contact_title_info"> BUS:</span>
        The Mizzymead Road bus stop is directly outside of the school (X8 service)</p>
      <p id="contact_info"><i id="contact_icon" class="fas fa-car-alt"></i><span id="contact_title_info"> CAR:</span>
        There are bookable parking facilities at Nailsea School, please call in advance to reserve a place.
        For satellite navigation please use this postcode BS48 2LE – it will take you to the front entrance,
        whereas our postcode takes you to the back (secured) entrance. </p>

      <p id="contact_title">Report a Student Absence</p>
      <P id="contact_info">By law we have to keep a detailed record of reasons for student absence. The number of times
        that a student has been absent during that academic year, is reported in their reports. This is a national
        requirement.
        It is vital that parents inform the school of the reason for any absence of their child.  </P>
      <table class="content-table" style="width:100%">
        <tr>
          <td>Student Absence Line :</td>
          <td>01275 850400</td>
        </tr>

        <tr>
          <td>ALL Covid19 absence, queries and track & trace to:</td>
          <td>C19@nailseaschool.com</td>
        </tr>

      </table>
    </div>

  </section>

  <footer>

    <div class="row">
      <img src="{{URL::asset('img/Horizontal-line.gif')}}">
      <div class="col">

        <h3>STUDENT TRAILING<div class="underline "><span></span></div>
        </h3><wbr>
        <p id="footer_p">I would encourage you to visit the school to experience things for yourself and I would be more
          than happy to take you on a tour of the site to see our staff and students in action.
          Please contact the school reception team on 01275 852251 to arrange a time that is convenient. </p>
      </div>
      <div class="col ">
        <h3 id="footer-links"> LINKS<div class="underline "><span></span></div>
        </h3>
        <ul>
          <li><a href="#home">HOME</a></li>
          <li><a href="#about">ABOUT US</a></li>
          <li><a href="#Headteacher">Headteacher</a></li>
          <li><a href="#Adv">Advertisement</a></li>
          <li><a href="#contactt">CONTACT</a></li>
          </li>
        </ul>
      </div>
      <div class="col footer_find">
        <h3>FIND US<div class="underline "><span></span></div>
        </h3>
        <p id="footer_p"> Mizzymead Road ,
        STUDENT TRAILING , BS48 2HN</p>
        <img id="footer-img" src="{{URL::asset('img/logo_fixed.png')}}">
      </div>

    </div>
    <hr id="footer_hr">
    <p class="copyright">All Rights Reserved @ 2021</p>
  </footer>
  </div>

  <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
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

    var a = document.getElementById('parent');
    var b = document.getElementById('teacher');
    var c = document.getElementById('s');
    var d = document.getElementById('t');
    var x = document.getElementById('studentlogin');
    var y = document.getElementById('userlogin');
    var z = document.getElementById('btn');
    function userlogin() {
      document.getElementById('userlogin')
      b.style.backgroundColor = '062841'
      d.style.color = '#c2ddf8'
      c.style.color = '#062841'
      a.style.backgroundColor = 'transparent'
      x.style.left = '-850px';
      y.style.left = '-20px';
      z.style.left = '-100px';

    }
    function studentlogin() {
      a.style.backgroundColor = '#062841'
      b.style.backgroundColor = 'transparent'
      d.style.color = '#062841'
      c.style.color = '#c2ddf8'
      x.style.left = '-20px';
      y.style.left = '900px';
      z.style.left = '0px';
    }
  </script>

</body>


</html>