<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/sub-sec-cla.css')}}">
    <title>Class</title>
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
            <li>C</li>
            <li>L</li>
            <li>A</li>
            <li>S</li>
            <li>S</li>
            <li>E</li>
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

        @if(Session::has('class_deleted'))
            <span><small style="color: green;">{{Session::get('class_deleted')}}</small></span>
        @endif
        <div class="dc">


            <form id="form_div_12" action="{{route('structure.storeclass')}}" method="post" >
                @csrf
                <input type="number" id="idF" name="class_number" placeholder="Name Class">
                <input type="submit" value="Add"><br>
                @if(Session::has('number_error'))
                <span><small style="color: red;">{{ Session::get('number_error') }}</small></span><br>
                 @elseif(Session::has('class_exist'))
                <span><small style="color: red;">{{ Session::get('class_exist') }}</small></span><br>
                @endif
                
            </form>

            <div id="div_div_11">
                @foreach($classes as $class)
                <p id="se">Class {{$class->num}} <a href="{{route('structure.deleteclass',['id'=>$class->num,])}}"><input type="button" value="delete"onclick="#"></a></p>
                @if(Session::has('class_with_section_subjects_'.$class->num))
                <span><small style="color: red;">{{Session::get('class_with_section_subjects_'.$class->num)}}</small></span>
                @endif

                @if(Session::has('class_with_section_'.$class->num))
                <span><small style="color: red;">{{Session::get('class_with_section_'.$class->num)}}</small></span>
                @endif

                @if(Session::has('class_with_subject_'.$class->num))
                <span><small style="color: red;">{{Session::get('class_with_section_subjects_'.$class->num)}}</small></span>
                @endif
                @endforeach
                
            </div>

        </div>
        

    </div>
    <br>


</body>

</html>