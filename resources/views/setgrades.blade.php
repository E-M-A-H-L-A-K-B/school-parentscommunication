<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Schedules:</h2>

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
                @if(!$class_test)
                    @php
                        $class_test = true;
                    @endphp
                    <h2>Class {{$class->num}}: <button id='class_bttn_{{$class->num}}' onclick="showsections(this)">Show Sections</button></h2>
                @endif
                @break
            @endif
        @endfor 
        @if($class_test)
            @break
        @endif
    @endforeach
    @if($class_test)
        <div id ='section_div_{{$class->num}}' style="display: none;">
        @foreach($class->sections as $section)
            @php
                $section_test = false;
            @endphp
            @for($i=0;$i < count($sections);$i++)
                @if($sections[$i] == $section->id)
                    <p> Section {{$section->num}} <button id="section_button_{{$class->num}}{{$section->id}}" onclick="showsubject(this)">Set Schedule</button></p>
                    <div id="subject_div_{{$class->num}}{{$section->id}}" style="display: none;">
                    @foreach($class->subjects as $subject)
                        <p>     {{$subject->name}} <button id="grades_button_{{$class->num}}{{$section->id}}{{$subject->id}}" onclick="showform(this)">Set grades</button></p>
                        <div id="grades_form_{{$class->num}}{{$section->id}}{{$subject->id}}" style="display: none;">
                                <form action="{{route('grades.store',['subject'=>$subject->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    Grades File: <input type="file" name="file"><br>
                                    @error('file') <span><small style="color: red;">{{ $massege }}</small></span> @enderror
                                    <input type="submit" value="Submit">
                                </form>
                        </div>
                        
                    @endforeach
                    </div>
                @endif
            @endfor 
        @endforeach
        </div>
    @endif
@endforeach

<script>
    function showsections(ele)
    {
        var id = ele.id;
        var num = id.split('_');
        var section_div = document.getElementById('section_div_'+num[num.length-1]);
        if(section_div.style.display == 'none')
        {
            section_div.style.display = 'block';
        }
        else
        {
            section_div.style.display = 'none';
        }
    }

    function showform(ele)
    {
        var id = ele.id;
        var num = id.split('_');
        var section_div = document.getElementById('grades_form_'+num[num.length-1]);
        if(section_div.style.display == 'none')
        {
            section_div.style.display = 'block';
        }
        else
        {
            section_div.style.display = 'none';
        }
    }

    function showsubject(ele)
    {
        var id = ele.id;
        var num = id.split('_');
        var section_div = document.getElementById('subject_div_'+num[num.length-1]);
        if(section_div.style.display == 'none')
        {
            section_div.style.display = 'block';
        }
        else
        {
            section_div.style.display = 'none';
        }
    }
</script>
</body>
</html>