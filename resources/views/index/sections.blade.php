<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/sub-sec-cla.css')}}">
    <title>sections</title>
</head>

<body>
    <a href="{{route('adminmain')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <div class="container">
        <div id="logo">
            <img src="{{URL::asset('img/logo_fixed.png')}}">
        </div>
    </div>
        <label>
            <ul>
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
    @if(Session::has('section_created'))
        <span><small style="color: green;">{{Session::get('section_created')}}</small></span>
    @endif

    @if(Session::has('section_deleted'))
        <span><small style="color: green;">{{Session::get('section_deleted')}}</small></span>
    @endif

    @if(Session::has('section_assigned_guide'))
    <span><small style="color: red;">{{Session::get('section_assigned_guide')}}</small></span>
    @endif
    
    @if(Session::has('section_assigned_guide_student'))
    <span><small style="color: red;">{{Session::get('section_assigned_guide_student')}}</small></span>
    @endif

    @if(Session::has('section_assigned_student'))
    <span><small style="color: red;">{{Session::get('section_assigned_student')}}</small></span>
    @endif

        @foreach($classes as $class)
        <h3>Class {{$class->num}}:</h3>
        <div class="dc">

            <button id="section_button_{{$class->num}}" class="tittle1"  onclick="showsdiv(this)">View Section</button>

            <button id="section_button_{{$class->num}}"  class="tittle2"  onclick="showsform(this)">Add section</button>
            @if(Session::has('section_exist_'.$class->num))
            <form id="form_div_{{$class->num}}" method="post" action="{{route('structure.storesection')}}" style="display: block;">
            @else
            <form id="form_div_{{$class->num}}" method="post" action="{{route('structure.storesection')}}" style="display: none;">
            @endif
                @csrf
                <input type="number" id="idF" name="section_number" placeholder="Section Number">
                <input type="hidden" name="class_number" value="{{ $class->num }}">
                <input type="submit" value="Add">
                @error('section_number') <span><small style="color: red;"></small>{{$message}}</span> @enderror
                @if(Session::has('section_exist_'.$class->num))
                    <span><small style="color: red;">{{Session::get('section_exist_'.$class->num)}}</small></span>
                @endif
            </form>

            <div id="div_div_{{$class->num}}" style="display: none;">
                @if(!$class->sections)
                <p id="se">There Are No Sections For This Class Yet</p>
                @else
                @foreach($class->sections as $section)
                    <p id="se">section {{$section->num}}<a href="{{route('structure.deletesection',['id'=>$section->id,])}}"><input type="button" value="delete"></a></p>
                @endforeach
                @endif
            </div>

        </div>
        @endforeach

    </div>
    </div>
    <br>

    <br>


    <script>
        function showsform(ele) {
            var id = ele.id;
            var num = id.split('_');
            var forms_div = document.getElementById('form_div_' + num[num.length - 1]);
            if (forms_div.style.display == 'none') {
                forms_div.style.display = 'block';
            }
            else {
                forms_div.style.display = 'none';
            }
        }

        function showsdiv(ele) {
            var id = ele.id;
            var num = id.split('_');
            var div_div = document.getElementById('div_div_' + num[num.length - 1]);
            if (div_div.style.display == 'none') {
                div_div.style.display = 'block';
            }
            else {
                div_div.style.display = 'none';
            }
        }
    </script>

</body>

</html>