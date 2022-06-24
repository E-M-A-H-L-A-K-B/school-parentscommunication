<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @php
        $section = Auth::guard('student')->user()->section_id;
        
    @endphp
    <h2>Staff Related To Student:</h2>

    <h3>Guide(s): </h3>
    @foreach(Auth::guard('student')->user()->section->guides as $guide)
    <p>{{ $guide->name}} {{ $guide->father}} {{ $guide->last_name}}</p>
    @endforeach
    <h2>Teachers:</h2>
    @foreach(Auth::guard('student')->user()->section->teachers as $teacher)
        @foreach($teacher->subjects as $subject)
            @php
                $test = false;
                if(DB::table('subject_teacher')
                ->where('teacher_id','=',$teacher->id)
                ->where('subject_id','=',$subject->id)
                ->where('section_id','=',$section)->exists())
                {
                    $test= true;
                }
            @endphp
            @if($test)
                <p>{{$teacher->name}} {{$teacher->father}} {{$teacher->last_name}} teaches {{ $subject->name }}</p>
            @endif
        @endforeach
    @endforeach
</body>
</html>