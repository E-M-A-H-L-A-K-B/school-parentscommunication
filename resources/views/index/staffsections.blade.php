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
            
            <div id="class_div_1" >
                @foreach(Auth::user()->sections->sortBy('class_num')->sortBy('num') as $section)
                    @if($loop->first)
                        @php
                            $num = $section->SClass->num;
                        @endphp
                        <p>Class {{$section->SClass->num}} <button id="class_button_{{$section->SClass->num}}" class="sele" onclick="showsection(this)">Select</button></p><br/>
                        <div id="section_div_{{$section->SClass->num}}" style="display: none;">
                    @endif
                    @if($num != $section->SClass->num)
                        @php
                            $num = $section->SClass->num;
                        @endphp
                        </div>
                        <p>Class {{$section->SClass->num}} <button id="class_button_{{$section->SClass->num}}" class="sele" onclick="showsection(this)">Select</button></p><br/>
                        <div id="section_div_{{$section->SClass->num}}" style="display: none;">
                    @endif
                    <p id="se">Section {{$section->num}} <a href="{{route('sections.announcement',['id'=>$section->id])}}"><input type="button" value="Select"></a></p>
                @endforeach
                </div>
                <p>Class 1 <button id="class_button_10" class="sele" onclick="showsection(this)">Select</button></p><br/>
                <div id="section_div_10" style="display: none;">
                    <p id="se">Section 1<input type="button" value="Add"onclick="#"></p>
                    <p id="se">Section 2<input type="button" value="Add"onclick="#"></p>
                    <p id="se">Section 3<input type="button" value="Add"onclick="#"></p>
                </div>
                <p>Class 2 <button id="class_button_12" class="sele" onclick="showsection(this)">Select</button></p><br/>
                <div id="section_div_12" style="display: none;">
                    <p id="se">Section 1<input type="button" value="Add"onclick="#"></p>
                    <p id="se">Section 2<input type="button" value="Add"onclick="#"></p>
                    <p id="se">Section 3<input type="button" value="Add"onclick="#"></p>

                </div>
                <p>Class 3 <button id="class_button_13" class="sele"onclick="showsection(this)">Select</button></p><br/>
                <div id="section_div_13" style="display: none;">
                    <p id="se">Section 1<input type="button" value="Add"onclick="#"></p>
                    <p id="se">Section 2<input type="button" value="Add"onclick="#"></p>
                    <p id="se">Section 3<input type="button" value="Add"onclick="#"></p>
                    <p id="se">Section 2<input type="button" value="Add"onclick="#"></p>
                    <p id="se">Section 2<input type="button" value="Add"onclick="#"></p>
                </div>
            </div>

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