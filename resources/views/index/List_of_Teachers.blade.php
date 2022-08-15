<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/List_of_Teachers.css')}}">
    <title>subject</title>
</head>

<body>
    <a href="{{route('studentmain')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <div class="container">
        <div id="logo">
            <img src="{{URL::asset('img/logo_fixed.png')}}">
        </div>
    </div>
    <label>
            <ul>
                   <li>L</li>
                <li>I</li>
                <li>S</li>
                 <li>T</li>
                    <li>_</li>
               
                
                <li>O</li>
                 <li>F</li>
                 
                <li>_</li>
                
                <li>T</li>
                <li>E</li>
                <li>A</li>
                <li>C</li>
                <li>H</li>
              <li>E</li>
                <li>R</li>
            <li>S</li>
                
            </ul>

        </label>
    <div class="dots">
        <div class="dot" style="--i:0;"></div>
        <div class="dot" style="--i:1;"></div>
        <div class="dot" style="--i:2;"></div>
        <div class="dot" style="--i:3;"></div>
        <div class="dot" style="--i:4;"></div>
        <div class="dot" style="--i:5;"></div>
        <div class="dot" style="--i:6;"></div>
    </div>

    @php
        $section = Auth::guard('student')->user()->section->id;
        
    @endphp

    <table>
        <tr>
            <th>Teacher </th>
            <th>Subject
            </th>

        </tr>
        @php
            $count = array();
        @endphp
        @foreach(Auth::guard('student')->user()->section->guides as $guide)
            <tr>
                <td>{{ $guide->name}} {{ $guide->father}} {{ $guide->last_name}}</td>
                <td>موجه</td>
            </tr>
        @endforeach
        @foreach(Auth::guard('student')->user()->section->teachers as $teacher)
            @if($loop->first)
                @php
                    array_push($count,$teacher->id);
                @endphp
            @else
                @php
                    $exist = false;
                    for($i=0 ;$i < count($count) ; $i++)
                    {
                        if($count[$i] == $teacher->id)
                        {
                            $exist = true;
                            break;
                        }
                    }
                @endphp
                @if($exist)
                    @continue
                @endif
            @endif

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
                    <tr>
                        <td>{{$teacher->name}} {{$teacher->father}} {{$teacher->last_name}}</td>
                        <td>{{ $subject->name }}</td>
                    </tr>
                @endif
            @endforeach
        @endforeach
    </table>
    <br>



</body>

</html>