<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/tea-gu.css')}}">
    <title>teachers</title>
</head>

<body>
    <a href="structuremain.html"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <div class="container">
        <div id="logo">
            <img src="{{URL::asset('img/logo_fixed.png')}}">
        </div>
    </div>
    <label>
        <ul>
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
    <div class="d">

        @if(Session::has('subject_teacher_added'))
        <span><small style="color: green;">{{Session::get('subject_teacher_added')}}</small></span>
        @endif

        @if(Session::has('subject_teacher_exists'))
            <span><small style="color: red;">{{Session::get('subject_teacher_exists')}}</small></span>
        @endif

        @if(Session::has('subject_exists'))
            <span><small style="color: red;">{{Session::get('subject_exists')}}</small></span>
        @endif

        @if(Session::has('subject_teacher_deleted'))
        <span><small style="color: green;">{{Session::get('subject_teacher_deleted')}}</small></span>
        @endif

        @foreach($teachers as $teacher)
        <h3> {{ $teacher->name }} {{ $teacher->father }} {{ $teacher->last_name }}:</h3>


        <div class="dc">

            <button id="class_button_{{$teacher->id}}" class="tittle2" onclick="showsdiv(this)">View The Subjects</button>
            <button id="class_button_{{$teacher->id}}" class="tittle1" onclick="showclass(this)">Select subject</button>


            <div id="class_div_{{$teacher->id}}" style="display: none;">

                @foreach($classes as $class)
                <p>Class {{ $class->num }} <button id="class_button_{{$teacher->id}}{{$class->num}}" class="sele" onclick="showsection(this)">Select</button></p><br />
                <div id="section_div_{{$teacher->id}}{{$class->num}}" style="display: none;">
                    @foreach($class->sections as $section)
                    <p id="se">Section {{ $section->num }}<button id="class_button_{{$teacher->id}}{{$class->num}}{{$section->id}}" class="sele" onclick="showsubject(this)">Select</button></p><br />
                    <div id="subject_div_{{$teacher->id}}{{$class->num}}{{$section->id}}" style="display: none;">
                        @foreach($class->subjects as $subject)
                        <p id="cho">{{ $subject->name }}<a href="{{route('structure.teachers.storesubjectteacher'
                                                                    ,['id'=>$teacher->id
                                                                    ,'section'=>$section->id
                                                                    ,'subject'=>$subject->id])}}"><input type="button" value="choose"></a></p>
                        @endforeach
                    </div>
                    @endforeach
                </div>
                @endforeach

            </div>

            <div id="divv_div_{{$teacher->id}}" style="display: none;">
                @if($teacher->subjects)
                @foreach($teacher->subjects as $subject)

                @php
                $dbsection = DB::table('sections')
                ->join('subject_teacher','sections.id','=','subject_teacher.section_id')
                ->select('sections.num','sections.id')
                ->where('subject_teacher.subject_id','=',$subject->id)
                ->get()[0];
                @endphp
                <p>{{ $subject->name }} for Class {{ $subject->myClass->num }} Section {{ $dbsection->num }} <a href="{{route('structure.teachers.deletesubjectteacher'
                                                                                                                        ,['id'=>$teacher->id
                                                                                                                        ,'section'=>$dbsection->id
                                                                                                                        ,'subject'=>$subject->id])}}"><button class="de" id="class_button_2">Delete</button></a> </p>
                @endforeach
                @else
                <p>This Teacher Does Not Have Any Subjects Currently</p>
                @endif
            </div>

        </div>
        @endforeach

    </div>
    <br>




    <script>
        function showclass(ele) {
            var id = ele.id;
            var num = id.split('_');
            var class_div = document.getElementById('class_div_' + num[num.length - 1]);
            if (class_div.style.display == 'none') {
                class_div.style.display = 'block';
            } else {
                class_div.style.display = 'none';
            }

        }


        function showsubject(ele) {
            var id = ele.id;
            var num = id.split('_');
            var subject_div = document.getElementById('subject_div_' + num[num.length - 1]);
            if (subject_div.style.display == 'none') {
                subject_div.style.display = 'block';
            } else {
                subject_div.style.display = 'none';
            }

        }

        function showsection(ele) {
            var id = ele.id;
            var num = id.split('_');
            var section_div = document.getElementById('section_div_' + num[num.length - 1]);
            if (section_div.style.display == 'none') {
                section_div.style.display = 'block';
            } else {
                section_div.style.display = 'none';
            }
        }

        function showsdiv(ele) {
            var id = ele.id;
            var num = id.split('_');
            var divv_div = document.getElementById('divv_div_' + num[num.length - 1])
            if (divv_div.style.display == 'none') {
                divv_div.style.display = 'block';
            } else {
                divv_div.style.display = 'none';
            }
        }
    </script>

</body>

</html>