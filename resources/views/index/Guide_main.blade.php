<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <script src="{{URL::asset('js/jquery-3.6.0.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/structuremain.css')}}">
    <title>Guide_main</title>
</head>

<body>
    <a href="index.html"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <a href="#"> <i id="left" class="fas fa-sign-out-alt"></i></a>
    <div id="logo">
        <img src="{{URL::asset('img/logo_fixed.png')}}">
    </div>
    <ul>
        <li>
            <a href="{{route('schedules.add')}}">
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
            <a href="{{route('grades.sections')}}">
                <div class="icon">
                    <i class="fa fa-list-alt" aria-hidden="true"> </i>
                    <i class="fa fa-list-alt" aria-hidden="true"> </i>
                </div>

                <div class="name"><span data-text="Marks">
                        Marks</span>
                </div>
            </a>
        </li>
        <li>
            <a href="{{route('feedback.myfeedbackstaff')}}">
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
            <a id="Add" class="add1" href="{{route('feedback.students')}}">
                <span id="s"></span>
                <span id="s"></span>
                <span id="s"></span>
                <span id="s"></span>
                Send Feedback
            </a>
            <a id="Add" class="add2" href="{{route('feedback.viewparents')}}">
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
                    <a href="{{route('sections.view')}}"><i class="fas fa-bullhorn" id="annn"></i></a>
                    <h3 id="ann">Announcements</h3>
                </div>
            </div>
        </div>

    </div>


</body>

</html>