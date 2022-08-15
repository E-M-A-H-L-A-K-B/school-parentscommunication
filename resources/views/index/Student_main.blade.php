<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <script src="{{URL::asset('js/jquery-3.6.0.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/structuremain.css')}}">
    <title>Student_main</title>
</head>

<body>
    <a href="{{route('home')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <a href="#"> <i id="left" class="fas fa-sign-out-alt"></i></a>
    <div id="logo">
        <img src="{{URL::asset('img/logo_fixed.png')}}">
    </div>
    <ul>
    
        <li>
            <a href="{{route('schedules.view')}}">
                <div class="icon">
                    <i class="fa fa-table" aria-hidden="true"> </i>
                    <i class="fa fa-table" aria-hidden="true"> </i>
                </div>
                <div class="name"><span data-text="Schedule">
                    Schedule</span>
                </div>
            </a>
        </li>

        <li>
            <a href="{{route('grades.view')}}">
                <div class="icon">
                    <i class="fa fa-check-square" aria-hidden="true"> </i>
                    <i class="fa fa-check-square" aria-hidden="true"> </i>
                </div>
                <div class="name"><span data-text="Marks">
                        Marks</span>
                </div>
            </a>
        </li>
      
        <li>
            <a href="{{route('viewsatff')}}">
                <div class="icon">
                    <i class="fa fa-users" aria-hidden="true"> </i>
                    <i class="fa fa-users" aria-hidden="true"> </i>
                </div>
                <div class="name"><span data-text="Teaching Staff">
                    Teaching Staff</span>
                </div>
            </a>
        </li>

        <li>
            <a href="{{route('feedback.myfeedbackparent')}}">
                <div class="icon">
                    <i class="fa fa-comments" aria-hidden="true"> </i>
                    <i class="fa fa-comments" aria-hidden="true"> </i>
                </div>
                <div class="name"><span data-text="My Feedback">
                     My Feedback</span>
                </div>
            </a>
        </li>

    </ul>

    <div class="container">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="panel"></div>
    </div>
    <div class="row">
       
        <div id="icon" class=" col-lg-4 clo col-md-6 clo col-sm-12 col-xs-12">
            <a id="Add" class="add1" href="{{route('feedback.parentfeedback')}}">
                <span id="s"></span>
                <span id="s"></span>
                <span id="s"></span>
                <span id="s"></span>
                Send Feedback
            </a>
            <a id="Add" class="add2" href="{{route('feedback.viewschool')}}">
                <span id="s"></span>
                <span id="s"></span>
                <span id="s"></span>
                <span id="s"></span>
                Receive Feedback
            </a>
        </div>
        
            <div class=" col-lg-4  clo col-d-6 clo col-sm-12 col-xs-12">
                <div class="center">
                    <div class="icon_ann">
                        <a href="{{route('announcements.sections',['id'=>Auth::guard('student')->user()->section_id])}}"><i class="fas fa-bullhorn" id="annn"></i></a>
                        <h3 id="ann">Announcements</h3>
                    </div>
                </div>
            </div>
     
    </div>

</body>

</html>
