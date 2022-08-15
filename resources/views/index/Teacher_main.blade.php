<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <script src="{{URL::asset('js/jquery-3.6.0.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/structuremain.css')}}">
    <title>Teacher_main</title>
</head>

<body>
    <a href="{{route('home')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <a href="#"> <i id="left" class="fas fa-sign-out-alt"></i></a>
    <div id="logo">
        <img src="{{URL::asset('img/logo_fixed.png')}}">
    </div>
    

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
            <a id="Add" class="add2" href="{{route('feedback.myfeedbackstaff')}}">
                <span id="s"></span>
                <span id="s"></span>
                <span id="s"></span>
                <span id="s"></span>
                My Feedback
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