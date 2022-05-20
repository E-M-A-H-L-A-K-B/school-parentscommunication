<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(Session::has('announ_stored'))
        <p>{{ Session::get('announ_stored') }}</p>
    @endif
    <h2>Add School Announcement:</h2>
    @if($section)
    <form action="{{route('sections.storeannouncement',['id'=>$section])}}" method="post">
    @else
    <form action="{{route('announcements.storeschool')}}" method="post">
    @endif
    
        @csrf
        <input type="submit" value="Add"><br>
        <textarea name="content"  cols="50" rows="10"></textarea>
    </form>
</body>
</html>