<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{URL::asset('css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/schedules.css')}}">
    <title>schedules</title>
</head>

<body>
    <a href="structuremain.html"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <div class="container">
        <div id="logo">
            <img src="{{URL::asset('img/logo_fixed.png')}}">
        </div>
    </div>
    <h1>Schedules:</h1>
    @foreach($classes as $class)
        @php
            $class_test = false;
        @endphp
        @foreach($class->sections as $section)
            @php
                $section_test = false;
            @endphp
            @for($i=0;$i < count($sections);$i++)
                @if($sections[$i] == $section->id)
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
            <section id="Class">
            
            
                <div class="card">
                    <div class="content">
                        <div class="card-content">
                            <div id="icon"><i class="fas fa-chalkboard"></i></div>
                            <p id="classes">Class {{$class->num}}
                            <button id='class_bttn_{{$class->num}}' class="t" onclick="showsections(this)">Show Sections<i
                                    class="fas fa-chevron-circle-down "></i>
                            </button></p>
                        
                            <div id='section_div_{{$class->num}}' style="display: none;">
                                @foreach($class->sections as $section)
    
                                    @for($i=0;$i < count($sections);$i++)
                                        @if($sections[$i] == $section->id)
                                            <p id="sectiones"> Section {{$section->num}}<button class="dd" id="section_button_{{$class->num}}{{$section->id}}"
                                                    onclick="showform(this)"><i class="fas fa-cloud-upload-alt"></i>
                                                </button></p>
                                            
                                            <div id="schedule_form_{{$class->num}}{{$section->id}}" style="display: none;">
                                                <form action="{{route('schedules.store',['section'=>$section->id])}}" method="post"
                                                    enctype="multipart/form-data">

                                                    @csrf
                                                    @error('pic') <span><small style="color: red;">{{ $massege }}</small></span> @enderror

                                                    <label id="f1">Upload File</label>
                                                    <input for="f1" type="file" required name="file" class="upload">
                                                    <label  id="f2">Upload Photo</label>
                                                    <input for="f2" type="file" required name="pic" class="upload">
                                                
                                                    <button type="submit" class="waves-effect waves-light btn-small">Submit</button>
                                                
                                                </form>
                                            </div>
                                        @endif
                                    @endfor
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            
            
            </section>
        @endif   
    @endforeach
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

        function showform(ele) {
            var id = ele.id;
            var num = id.split('_');
            var section_div = document.getElementById('schedule_form_' + num[num.length - 1]);
            if (section_div.style.display == 'none') {
                section_div.style.display = 'block';
            }
            else {
                section_div.style.display = 'none';
            }
        }
    </script>
    <script src="{{URL::asset('js/materialize.js')}}"></script>
</body>

</html>