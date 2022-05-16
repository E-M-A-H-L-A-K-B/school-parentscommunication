<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Guide: {{$guide->name}} {{$guide->father}} {{$guide->last_name}}</h2>
    @if($guide->sections)
        <p>Guiding:</p>
        @foreach($guide->sections as $section)
            <p>     Section {{ $section->num }} Of Class {{ $section->SClass->num }} <button><a href="{{route('structure.guide.deletesectionguide'
                                                                                                        ,['id'=>$guide->id
                                                                                                        ,'section'=>$section->id])}}">Delete Section</a></button></p>
        @endforeach
    @endif

    @foreach($classes as $class)
                <p>Class {{ $class->num }}:</p>
                @foreach($class->sections as $section)
                <p>     Section {{ $section->num }} <button><a href="{{route('structure.guide.storesectionguide'
                                                                                                        ,['id'=>$guide->id
                                                                                                        ,'section'=>$section->id])}}">Delete Section</a></button></p>
                @endforeach
    @endforeach
</body>
</html>