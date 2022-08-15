<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/ViewAnnouncement.css')}}">
    <title>ViewAnnouncement</title>
</head>

<body>
    <a href="{{route('studentmain')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <div class="container">
        <div id="logo">
            <img src="{{URL::asset('img/logo_fixed.png')}}">
        </div>
    </div>

    <section id="Announcements" class="cur_container">
        <div class="title_text">
          <h1 data-text="Announcements">Announcements</h1>
        </div>
        <div class="Announcements_box">
            @foreach($announs as $announ)
                <div class="Announcements_item">
                    <h3>Announcement</h3>
                    <hr>
                    @if($announ->user->guide)
                        <h4> Guide</h4>
                    @elseif($announ->user->teacher)
                        <h4> Teacher</h4>
                    @endif
                    <h5>{{$announ->user->name}} {{$announ->user->father}} {{$announ->user->last_name}}</h5>
                    <hr>
                    <h6>{{ $announ->created_at->format('d-M-Y') }}</h6>
                    <div class="Announcements_desc">
                        <p>{{$announ->content}} 
                        </p>
                    </div>
                </div>
            @endforeach
           
        </div>
    </section>


</body>