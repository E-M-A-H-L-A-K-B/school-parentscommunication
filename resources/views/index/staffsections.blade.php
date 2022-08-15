<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/tea-gu.css')}}">
    <title>select_sec_ann</title>
</head>

<body>
    @if(Auth::user()->guide)
    <a href="{{route('guidemain')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    @elseif(Auth::user()->teacher)
    <a href="{{route('teachermain')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    @endif
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
            <li>E</li>
            <li>C</li>
            <li>T</li>
            <li>I</li>
            <li>O</li>
            <li>N</li>
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
        <div class="dc">
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
                <div id="class_div_1" >
                    <p>Class {{$class->num}} <button id="class_button_{{$class->num}}" class="sele" onclick="showsection(this)">Select</button></p><br/>
                    <div id="section_div_{{$class->num}}" style="display: none;">
                        @foreach($class->sections as $section)
                            @for($i=0; $i< count($sections);$i++)
                                @if($section->id == $sections[$i])
                                    <p id="se">Section {{$section->num}} <a href="{{route('sections.announcement',['id'=>$section->id])}}"><input type="button" value="Select"></a></p>
                                @endif
                            @endfor
                        @endforeach
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    <br>


    <script>
        function showclass(ele) {
            var id = ele.id;
            var num = id.split('_');
            var class_div = document.getElementById('class_div_' + num[num.length - 1]);
            if (class_div.style.display == 'none') {
                class_div.style.display = 'block';
            }
            else {
                class_div.style.display = 'none';
            }

        }

        function showsection(ele) {
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


        f

       
    </script>

</body>

</html>