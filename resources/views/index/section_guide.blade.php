<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/tea-gu.css')}}">
    <title>guided</title>
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
            <li>G</li>
            <li>U</li>
            <li>I</li>
            <li>D</li>
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
     @foreach($guides as $guide)
        <h3> {{$guide->name}} {{$guide->father}} {{$guide->last_name}}:</h3>
        <div class="dc">

            <button id="class_button_{{$guide->id}}" class="tittle2" onclick="showsdiv(this)">View The Sections</button>
            <button id="class_button_{{$guide->id}}" class="tittle1" onclick="showclass(this)">Select Section</button>


            <div id="class_div_{{$guide->id}}" style="display: none;">
                @foreach($classes as $class)
                <p>Class {{$class->num}} <button id="class_button_{{$guide->id}}{{$class->num}}" class="sele" onclick="showsection(this)">Select</button></p><br/>
                    <div id="section_div_{{$guide->id}}{{$class->num}}" style="display: none;">
                        @foreach($class->sections as $section)
                        <p id="se">Section {{$section->num}} <a href="{{route('structure.guide.storesectionguide'
                                                                    ,['id'=>$guide->id
                                                                    ,'section'=>$section->id])}}"><input type="button" value="Add"></a></p>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div id="divv_div_{{$guide->id}}" style="display: none;">
                @if($guide->sections)
            @foreach($guide->sections as $section)
                <p>Section {{ $section->num }} Of Class {{ $section->SClass->num }} <a href="{{route('structure.guide.deletesectionguide'
                                                                                                            ,['id'=>$guide->id
                                                                                                            ,'section'=>$section->id])}}"><button>Delete Section</button></a></p>
            @endforeach
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

        function showsdiv(ele) {
            var id = ele.id;
            var num = id.split('_');
            var divv_div = document.getElementById('divv_div_' + num[num.length - 1])
            if (divv_div.style.display == 'none') {
                divv_div.style.display = 'block';
            }
            else {
                divv_div.style.display = 'none';
            }
        }
    </script>

</body>

</html>