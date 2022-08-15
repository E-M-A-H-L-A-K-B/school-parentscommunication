<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/sendfeedback.css')}}">
    <title>sendfeedback</title>
</head>

<body>
    @if(Auth::guard('student')->check())
    <a href="{{route('studentmain')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    @elseif(Auth::user()->guide)
    <a href="{{route('feedback.students')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    @elseif(Auth::user()->teacher)
    <a href="{{route('feedback.students')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    @endif
    <div class="container">
        <div id="logo">
            <img src="{{URL::asset('img/logo_fixed.png')}}">
        </div>
    </div>
    <section id="Announcements">
        <label>
           <h2> Send Feedback</h2>
        </label>
        <div class="box">
            <div class="icon" style="--i:0"><i class="fas fa-comments"></i></div>
            <div class="icon" style="--i:1"><i class="fas fa-comments"></i></div>
            <div class="icon" style="--i:2"><i class="fas fa-comments"></i></div>
            <div class="icon" style="--i:3"><i class="fas fa-comments"></i></div>
            <div class="icon" style="--i:4"><i class="fas fa-comments"></i></div>
            <div class="icon" style="--i:5"><i class="fas fa-comments"></i></div>
            <div class="icon" style="--i:6"><i class="fas fa-comments"></i></div>
            <div class="icon" style="--i:7"><i class="fas fa-comments"></i></div>
            <div class="icon" style="--i:8"><i class="fas fa-comments"></i></div>
            <div class="icon" style="--i:9"><i class="fas fa-comments"></i></div>
            @if($student)
                <form action="{{route('feedback.storeschoolfeedback',['id'=>$student])}}" method="post">
            @else
                <form action="{{route('feedback.storeparentsfeedback')}}" method="post">
            @endif
                @csrf
                <textarea rows="6" cols="5" type="text" id="textarea" class="form-control" name="content" required
                    pattern="[a-zA-Z0-9 .]+" placeholder="Enter The Feedback"></textarea>
                    @error('content') <span><small style="color: red;">{{ $massege}}</small></span> @enderror

                    @if(Session::has('feedback_created'))
                    <p style="color: green;">{{ Session::get('feedback_created') }}</p>
                    @endif
                <input type="submit" id="confirm" value="Confirm">
            </form>
        </div>
    </section>

</body>