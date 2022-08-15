<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/Sort.css')}}">
    <title>Sort</title>
</head>

<body>
    <a href="{{route('adminmain')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <div class="container">
        <div id="logo">
            <img src="{{URL::asset('img/logo_fixed.png')}}">
        </div>
    </div>
    <h1>Student</h1>
    <div class="card">
            @if(Session::has('sort_complete'))
                <span><small style="color: green;">{{Session::get('sort_complete')}}</small></span>
            @elseif(Session::has('sort_failed'))
                <span><small style="color: red;">{{Session::get('sort_failed')}}</small></span>
            @endif
        <form align="center" action="{{route('students.sort')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div id="up">
                <label id="f1">Upload File</label>
            </div>

            <input for="f1" name="file" type="file" required class="upload">
            <button type="submit" class="waves-effect waves-light btn-small">Submit</button>
        </form>    

        <div class="show">

            <p align="center"><button autofocus id="section_button_1" onclick="showstudents(this)">Show
                    Students<i class="fas fa-chevron-circle-down "></i></button></p>
            <div id="students_div_1" style="display: none;">

                <table align="center" width="400" height="100">
                    <thead>
                        <tr align="center">
                            <td>Full Name</td>
                            <td>Class</td>
                            <td>Section</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr align="center">
                                <td> {{ $student->name }} {{ $student->father }} {{ $student->last_name }}</td>
                                <td>{{ $student->class_num }}</td>
                                @if($student->section)
                                    <td>{{ $student->section->num }}</td>
                                @else
                                    <td>None</td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script>

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