<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(Session::has('subject_teacher_added'))
        <h2>{{Session::get('subject_teacher_added')}}</h2>
    @endif

    @if(Session::has('subject_teacher_deleted'))
        <h2>{{Session::get('subject_teacher_deleted')}}</h2>
    @endif

    <h2>Teacher: {{ $teacher->name }} {{ $teacher->father }} {{ $teacher->last_name }}</h2>
    @if($teacher->subjects)
        Currently Teaching:
        @foreach($teacher->subjects as $subject)

        @php
            $dbsection = DB::table('sections')
                            ->join('subject_teacher','sections.id','=','subject_teacher.section_id')
                            ->select('sections.num','sections.id')
                            ->where('subject_teacher.subject_id','=',$subject->id)
                            ->get()[0];
        @endphp

        <p>{{ $subject->name }} for Class {{ $subject->myClass->num }} Section {{ $dbsection->num }} <button><a href="{{route('structure.teachers.deletesubjectteacher'
                                                                                                                    ,['id'=>$teacher->id
                                                                                                                    ,'section'=>$dbsection->id
                                                                                                                    ,'subject'=>$subject->id])}}">
                                                                                                                    Delete Subject From Teacher</a></button></p>
        @endforeach
    @endif

    <h2>Subjects:</h2>
    @foreach($classes as $class)
            <p> Class {{ $class->num }}:</p>
            @foreach($class->sections as $section)
                <p>     Section {{ $section->num }}:</p>
                @foreach($class->subjects as $subject)
                <p>         {{ $subject->name }} <button><a href="{{route('structure.teachers.storesubjectteacher'
                                                                    ,['id'=>$teacher->id
                                                                    ,'section'=>$section->id
                                                                    ,'subject'=>$subject->id])}}">
                                                                    Add subject to teacher</a></button> </p>
                @endforeach
            @endforeach
    @endforeach
</body>
</html>