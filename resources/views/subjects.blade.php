<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@if(Session::has('section_created'))
    <h2 style="color: green;">{{ Session::get('section_created') }}</h2>
@endif

@if(Session::has('section_deleted'))
    <h2 style="color: green;">{{ Session::get('section_deleted') }}</h2>
@endif

    <h2>Subjects:</h2>
    @foreach($classes as $class)
        @if($class->num == 1)
            <h3>first class</h3>
        @elseif($class->num == 2)
            <h3>Second Class</h3>
        @elseif($class->num == 3)
            <h3>Third Class</h3>
        @elseif($class->num == 4)
            <h3>Fourth Class</h3>
        @elseif($class->num == 5)
            <h3>Fifth Class</h3>
        @elseif($class->num == 6)
            <h3>Sixth Class</h3>
        @elseif($class->num == 7)
            <h3>Seventh Class</h3>
        @elseif($class->num == 8)
            <h3>Eigth Class</h3>
        @elseif($class->num == 9)
            <h3>Nineth Class</h3>
        @elseif($class->num == 10)
            <h3>Tenth Class</h3>
        @elseif($class->num == 11)
            <h3>Eleventh Class</h3>
        @elseif($class->num == 12)
            <h3>Twelveth Class</h3>
        @endif
        <form action="{{ route('structure.storesubject') }}" method="post">
            @csrf
            <input type="text" name="subject_name">
            <input type="hidden" name="class_number" value="{{ $class->num }}">
            <input type="submit" name="submit">
            @if(Session::has('subject_exist_'.$class->num))
            <span><small style="color: red;">{{ Session::get('subject_exist_'.$class->num) }}</small></span>
            @endif
        </form>
        <h4></h4>
        @foreach($class->subjects as $subject)
            <p>     {{ $subject->name }} <button><a href="{{ route('structure.deletesubject',['id'=>$subject->id,]) }}">Delete Subject</a></button></p>
        @endforeach

    @endforeach
</body>
</html>