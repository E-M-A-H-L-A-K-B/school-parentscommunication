<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Staff Sections:</h2>
    @foreach(Auth::user()->sections->sortBy('class_num')->sortBy('num') as $section)
        @if($loop->first)
            @php
                $num = $section->SClass->num;
            @endphp
            <h3>Class {{ $section->SClass->num }}:</h3>
        @endif
        @if($num != $section->SClass->num)
            @php
                $num = $section->SClass->num;
            @endphp
            <h3>Class {{ $section->SClass->num }}:</h3>
        @endif
        <p>Section {{$section->num}} <a href="{{route('sections.announcement',['id'=>$section->id])}}"><button>Add Announcement</button></a></p>
    @endforeach
</body>
</html>