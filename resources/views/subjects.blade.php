<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="{{URL::asset('css/second.css')}}">


<body>

    <div class="d">


        @foreach($classes as $class)
        <h3>Class {{$class->num}}:</h3>
        <div class="dc">

            <button id="section_button_{{$class->num}}" onclick="showsform(this)">Add</button>
            <button id="section_button_{{$class->num}}" onclick="showsdiv(this)">View</button>

            @if(Session::has('subject-exist_'.$class->num))
            <form id="form_div_{{$class->num}}" action="{{route('structure.storesubject')}}" method="POST" style="display: block;">
            @else
            <form id="form_div_{{$class->num}}" action="{{route('structure.storesubject')}}" method="POST" style="display: none;">
            @endif
                <input type="text" id="idF" name="subject_name">
                <input type="hidden" name="class_number" value="{{ $class->num }}">
                <input type="submit" value="Add">
                @if(Session::has('subject_exist_'.$class->num))
                <span><small style="color: red;">{{ Session::get('subject_exist_'.$class->num) }}</small></span>
                @endif
            </form>

            <div id="div_div_{{$class->num}}" style="display: none;">
                @foreach($class->subjects as $subject)
                <p>{{$subject->name}}</p>
                @endforeach
            </div>

        </div>
        @endforeach



        <h3>Class 1:</h3>
        <div class="dc">

            <button id="section_button_12" onclick="showsform(this)">Add</button>
            <button id="section_button_11" onclick="showsdiv(this)">View</button>

            <form id="form_div_12" style="display: none;">
                <input type="text" id="idF" name="nameF">
                <input type="submit" value="Add">
            </form>

            <div id="div_div_11" style="display: none;">
                <p>Arabic</p>
                <p>Art</p>
                <p>Math</p>
            </div>

        </div>




        <h3>Class 2:</h3>

        <div class="dc">
            <button id="section_button_22" onclick="showsform(this)">Add</button>


            <button id="section_button_21" onclick="showsdiv(this)">View</button>
            <form id="form_div_22" style="display: none;">
                <input type="text" id="idF" name="nameF">
                <input type="submit" value="Add">
            </form>

            <div id="div_div_21" style="display: none;">
                <p>Music</p>
                <p>Frinch</p>
                <p>English</p>
            </div>

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