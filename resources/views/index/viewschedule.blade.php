<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/viewschedule.css')}}">
    <title>viewschedule</title>
</head>

<body>

    <a href="{{route('studentmain')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <div class="container">
        <div id="logo">
            <img src="{{URL::asset('img/logo_fixed.png')}}">
        </div>
    </div>
    <h1>Schedule</h1>

    <section id="schedule">

        <div id="box">
            <img src="{{asset('schedules')}}/{{$schedule->picture}}" alt="Section Schedule Image"  id="imBX" >
            <div id="contentt">
                <h2>Schedule For Section {{Auth::guard('student')->user()->section->num}} From Class {{Auth::guard('student')->user()->class_num}}:</h2>
            </div>
            <div class="details">
                <h3>Download PDF</h3>
            </div>
            <div id="tog">
                <a href="{{route('schedules.download',['file'=>$schedule->id])}}">
                    <button ><i class="fas fa-cloud-download-alt"></i></button></a>
            </div>
        </div>

    </section>
</body>

</html>