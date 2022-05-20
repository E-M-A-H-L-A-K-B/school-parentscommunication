<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Your Section Announcements:</h2>
    @foreach($announs as $announ)
        @if($loop->first)
            @php
                $date = $announ->created_at->format('d/M/Y');
            @endphp
            <h2>{{ $date }}</h2>
        @endif
        @if($announ->created_at->format('d/M/Y') != $date)
            @php
                $date = $announ->created_at->format('d/M/Y');
            @endphp
            <h2>{{ $date }}</h2>
        @endif
        <p>-{{ $announ->created_at->format('H:i') }} </p>
           <p> {{$announ->content}}</p>
            <p>--{{$announ->user->name}} {{$announ->user->father}} {{$announ->user->last_name}} 
                @if($announ->user->subjects->count())
                    @php
                        $subject = DB::table('subjects')
                                    ->join('subject_teacher','subjects.id','=','subject_teacher.subject_id')
                                    ->select('subjects.name')
                                    ->where('subject_teacher.section_id','=',$section)
                                    ->where('subject_teacher.teacher_id','=',$announ->user->id)
                                    ->get()[0];
                    @endphp
                    --  مدرس مادة {{$subject->name}}
                @endif
            </p>
        <hr>
    @endforeach
</body>
</html>