<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <script src="{{URL::asset('js/jquery-3.6.0.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/structuremain.css')}}">
    <title>structuremain</title>
</head>

<body>
    <a href="{{route('home')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <a href="#"> <i id="left" class="fas fa-sign-out-alt"></i></a>
    <div id="logo">
        <img src="{{URL::asset('img/logo_fixed.png')}}">
    </div>
    <ul>
        <li>

            <a href="{{route('structure.classes')}}">
                <div class="icon">
                    <i class="fa fa-chalkboard" aria-hidden="true"> </i>
                    <i class="fa fa-chalkboard" aria-hidden="true"> </i>
                </div>
                <div class="name"><span data-text="Classes">
                        Classes</span>
                </div>
            </a>
        </li>

        <li>
            <a href="{{route('structure.sections')}}">
                <div class="icon">
                    <i class="fa fa-list-alt" aria-hidden="true"> </i>
                    <i class="fa fa-list-alt" aria-hidden="true"> </i>
                </div>

                <div class="name"><span data-text="Sections">
                        Sections</span>
                </div>
            </a>
        </li>

        <li>
            <a href="{{route('structure.subjects')}}">
                <div class="icon">
                    <i class="fa fa-book" aria-hidden="true"> </i>
                    <i class="fa fa-book" aria-hidden="true"> </i>
                </div>

                <div class="name"><span data-text="subjects">
                        subjects</span>
                </div>
            </a>
        </li>

        <li>
            <a href="{{route('structure.guides')}}">
                <div class="icon">
                    <i class="fa fa-user-tie" aria-hidden="true"></i>
                    <i class="fa fa-user-tie" aria-hidden="true"></i>
                </div>

                <div class="name"><span data-text="Guides">
                        Guides</span>
                </div>
            </a>
        </li>

        <li>
            <a href="{{route('structure.teachers')}}">
                <div class="icon">
                    <i class="fa fa-chalkboard-teacher" aria-hidden="true"></i>
                    <i class="fa fa-chalkboard-teacher" aria-hidden="true"></i>
                </div>

                <div class="name"><span data-text="Teachers">
                        Teachers</span>
                </div>
            </a>
        </li>

        <li>
            <a href="{{route('structure.students')}}">
                <div class="icon">
                    <i class="fa fa-book-reader" aria-hidden="true"></i>
                    <i class="fa fa-book-reader" aria-hidden="true"></i>
                </div>

                <div class="name"><span data-text="Students">
                        Students</span>
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
            <a id="Add" class="add1" href="{{route('addstudent')}}">
                <span id="s"></span>
                <span id="s"></span>
                <span id="s"></span>
                <span id="s"></span>
                Add Student
            </a>
            <a id="Add" class="add2" href="{{route('addstaff')}}">
                <span id="s"></span>
                <span id="s"></span>
                <span id="s"></span>
                <span id="s"></span>
                Add Staff
            </a>
        </div>

        <div class=" col-lg-4  clo col-d-6 clo col-sm-12 col-xs-12">
            <div class="center">
                <div class="icon_ann">
                    <a href="{{route('announcements.addschool')}}"><i class="fas fa-bullhorn" id="annn"></i></a>
                    <h3 id="ann">Announcements</h3>
                </div>
            </div>
        </div>

    </div>


</body>

</html>