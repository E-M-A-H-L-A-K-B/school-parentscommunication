<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Teachers:</h2>
    @foreach($teachers as $teacher)
        <p>{{ $teacher->name }} {{ $teacher->father }} {{ $teacher->last_name }} <button><a href="{{route('structure.teachers.subjects',['id'=>$teacher->id])}}">Edit Subjects</a></button></p>
    @endforeach
    
</body>
</html>