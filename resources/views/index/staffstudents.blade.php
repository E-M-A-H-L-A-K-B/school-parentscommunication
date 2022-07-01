<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/staffstudents.css')}}">
    <title>staffstudents</title>
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
            <li>S</li>
            <li>E</li>
            <li>L</li>
            <li>E</li>
            <li>C</li>
            <li>T</li>
            <li>*</li>
            <li>S</li>
            <li>T</li>
            <li>U</li>
            <li>D</li>
            <li>E</li>
            <li>N</li>
            <li>T</li>
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

    <div class="content">
        @foreach($classes as $class)
            @php
                $class_test = false;
            @endphp
            @foreach($class->sections as $section)
                @for($i=0;$i< count($sections);$i++)
                    @if($section->id == $sections[$i])
                        @php
                            $class_test = true;
                        @endphp
                        @break
                    @endif
                @endfor
                @if($class_test)
                    @break
                @endif
            @endforeach
            @if($class_test)
                <div class="box">
                    <h2>Class {{$class->num}} <button id='class_bttn_{{$class->num}}' onclick="showsections(this)">Show Sections</button></h2>

                    <div id='section_div_{{$class->num}}' style="display: none;">
                        @foreach($class->sections as $section)
                            @for($i=0; $i< count($sections);$i++)
                                @if($section->id == $sections[$i])
                                    <p id="section"> {{$sections[$i]}} {{$i}} Section {{$section->num}} {{$section->id}} <button id="section_button_{{$class->num}}{{$section->id}}"
                                            onclick="showstudents(this)">Show
                                            Students</button></p>
                                    <div id="students_div_{{$class->num}}{{$section->id}}" style="display: none;">
                                        @foreach($section->students as $student)
                                            <p id="name"> {{$student->name}} {{$student->father}} {{$student->last_name}} <a href="{{route('feedback.schoolfeedback',['id'=>$student->id])}}"><button>Send
                                                        Feedback</button></a></p>
                                        @endforeach
                                    </div>
                                @endif
                            @endfor
                        @endforeach
                    </div>

                </div>
            @endif
        @endforeach

    </div>

    <script>
        function showsections(ele) {
            var id = ele.id;
            var num = id.split('_');
            var section_div = document.getElementById('section_div_' + num[num.length - 1]);
            if (section_div.style.display == 'none') {
                section_div.style.display = 'block';
            }
            else {
                section_div.style.display = 'none';
            }
        }

        function showstudents(ele) {
            var id = ele.id;
            var num = id.split('_');
            var section_div = document.getElementById('students_div_' + num[num.length - 1]);
            if (section_div.style.display == 'none') {
                section_div.style.display = 'block';
            }
            else {
                section_div.style.display = 'none';
            }
        }
    </script>
</body>

</html>