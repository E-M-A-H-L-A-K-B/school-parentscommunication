<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Students:</h2>
    <hr>
    <h2>Sort Students:</h2>
    <form action="{{route('students.sort')}}" method="post" enctype="multipart/form-data">
        @csrf
        Sort File:<input type="file" name="file"><br>
        <input type="submit" value="Sort">
    </form><br>
    <hr>

    <h2>Current Students</h2>
    @foreach($students as $student)
        <p>{{ $student->name }} {{ $student->father }} {{ $student->last_name }} من الصف {{ $student->class_num }}
            @if($student->section)
             شعبة {{ $student->section->num }}
            @else
             لم يتعين في شعبة
            @endif
        </p>
    @endforeach
</body>
</html>