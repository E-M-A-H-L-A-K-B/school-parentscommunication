<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Current Classes</h2>
    @if(Session::has('class_created'))
        <h2 style="color: green;">{{ Session::get('class_created') }}</h2>
    @endif
    
    <h3>Classes:</h3>
    @foreach($classes as $class)
        @if($class->num == 1)
            <p>first class</p>
        @elseif($class->num == 2)
            <p>Second Class</p>
        @elseif($class->num == 3)
            <p>Third Class</p>
        @elseif($class->num == 4)
            <p>Fourth Class</p>
        @elseif($class->num == 5)
            <p>Fifth Class</p>
        @elseif($class->num == 6)
            <p>Sixth Class</p>
        @elseif($class->num == 7)
            <p>Seventh Class</p>
        @elseif($class->num == 8)
            <p>Eigth Class</p>
        @elseif($class->num == 9)
            <p>Nineth Class</p>
        @elseif($class->num == 10)
            <p>Tenth Class</p>
        @elseif($class->num == 11)
            <p>Eleventh Class</p>
        @elseif($class->num == 12)
            <p>Twelveth Class</p>
        @endif
        <button><a href="{{route('structure.deleteclass',['id'=>$class->num,])}}">Delete</a></button>
    @endforeach
    <hr>
    <form action="{{route('structure.storeclass')}}" method="post">
        @csrf
        Class Number:<input type="number" name="class_number">
        <input type="submit" value="Submit"><br>
        @if(Session::has('number_error'))
            <span><small style="color: red;">{{ Session::get('number_error') }}</small></span><br>
        @elseif(Session::has('class_exist'))
            <span><small style="color: red;">{{ Session::get('class_exist') }}</small></span><br>
        @endif
    </form>
</body>
</html>