<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/AddAnnouncement.css')}}">
    <title>AddAnnouncement</title>
</head>

<body>
    <a href="structuremain.html"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <div class="container">
        <div id="logo">
            <img src="{{URL::asset('img/logo_fixed.png')}}">
        </div>
    </div>
    <section id="Announcements">
        <label>
            <ul>
                <li>A</li>
                <li>N</li>
                <li>N</li>
                <li>O</li>
                <li>U</li>
                <li>N</li>
                <li>C</li>
                <li>E</li>
                <li>M</li>
                <li>E</li>
                <li>N</li>
                <li>T</li>
                <li>S</li>
            </ul>
        </label>
        <div class="box">
            <div class="icon" style="--i:0"><i class="fas fa-bullhorn"></i></div>
            <div class="icon" style="--i:1"><i class="fas fa-bullhorn"></i></div>
            <div class="icon" style="--i:2"><i class="fas fa-bullhorn"></i></div>
            <div class="icon" style="--i:3"><i class="fas fa-bullhorn"></i></div>
            <div class="icon" style="--i:4"><i class="fas fa-bullhorn"></i></div>
            <div class="icon" style="--i:5"><i class="fas fa-bullhorn"></i></div>
            <div class="icon" style="--i:6"><i class="fas fa-bullhorn"></i></div>
            <div class="icon" style="--i:7"><i class="fas fa-bullhorn"></i></div>
            <div class="icon" style="--i:8"><i class="fas fa-bullhorn"></i></div>
            <div class="icon" style="--i:9"><i class="fas fa-bullhorn"></i></div>
            @if($section)
            <form action="{{route('sections.storeannouncement',['id'=>$section])}}" method="post">
            @else
            <form action="{{route('announcements.storeschool')}}" method="post">
            @endif
                @csrf
                
            <textarea rows="6" cols="5" type="text" id="textarea" class="form-control" name="content" required
                pattern="[a-zA-Z0-9 .]+" placeholder="Enter The Announcements"></textarea>

                @if(Session::has('announ_stored'))
                <p style="color: green;">{{ Session::get('announ_stored') }}</p>
                @endif
            <input type="submit" id="confirm" value="Confirm">
        </form>
        </div>
    </section>

</body>
</html>