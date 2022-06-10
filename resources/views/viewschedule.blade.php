<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Schedule For Section {{Auth::guard('student')->user()->section->num}} From Class {{Auth::guard('student')->user()->class_num}}:</h2>
    <img src="{{asset('storage/app/'.$schedule->picture)}}" alt="Section Schedule Image">
    @if($schedule->file)
    <a href="{{route('schedules.download',['file'=>$schedule->file])}}"><button>Download PDF</button></a>
    @endif
</body>
</html>