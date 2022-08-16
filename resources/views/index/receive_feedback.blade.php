<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/receive_feedback.css')}}">
    <title>receive_feedback</title>
</head>

<body>
@if(Auth::guard('student')->check())
    <a href="{{route('studentmain')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    @elseif(Auth::user()->guide)
    <a href="{{route('guidemain')}}"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    @endif
    <div class="container">
        <div id="logo">
            <img src="{{URL::asset('img/logo_fixed.png')}}">
        </div>
    </div>

    <h2> Feedback</h2>
    @foreach($feedbacks as $feedback)
        <section id="My_Feedback">

            <div id="box">
                <span></span>
                <div id="contentt">
                    @if($student)
                        @if($feedback->subject != null)
                            <p id="send-to">{{$feedback->user->name}} {{$feedback->user->father}} {{$feedback->user->last_name}}
                            <p id="from">{{$feedback->subject->name}}</p>
                            </p>
                        @else
                            <p id="send-to">{{$feedback->user->name}} {{$feedback->user->father}} {{$feedback->user->last_name}}
                            <p id="from">Section Guide</p>
                            </p>
                        @endif
                    @else
                        <p id="send-to">{{$feedback->student->name}} {{$feedback->student->father}} {{$feedback->student->last_name}}
                        <p id="from">from Class {{$feedback->section->SClass->num}} Section {{$feedback->section->num}}</p>
                        </p>
                    @endif

                    <p id="feed-cont">{{$feedback->content}} </p>
                    <p id="feed-created-at">{{$feedback->created_at->format('Y-M-d H:i')}}</p>

                    @if($feedback->responded)
                        <button class="Show2" id="response_button_{{$feedback->id}}" onclick="showresponse(this)">Show
                            Response</button>
                        
                        <div class="popup" id="response_div_{{$feedback->id}}" style="display: none;">
                            <p id="feed-response-cont">{{$feedback->response->content}}</p>
                            <p id="feed-response-create">{{$feedback->response->created_at->format('Y-M-d H:i')}}</p>
                        </div>
                    @else
                        <button class="Show1" id="response_button_{{$feedback->id}}" onclick="showform(this)">Respond To
                            Feedback</button>

                        <div id="response_form_{{$feedback->id}}" style="display: none;">
                            @if($student)
                                <form action="{{route('feedback.respondtoschool',['id'=>$feedback->id])}}" method="post">
                            @else
                                <form action="{{route('feedback.respondtoparent',['id'=>$feedback->id])}}" method="post">
                                @error('response') <span><small style="color: red;"></small>{{$message}}</span> @enderror
                            @endif
                                @csrf
                                <textarea name="response" required placeholder="ww"></textarea>
                                <input type="submit" id="Respond" value="Respond"><br>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

        </section>
    @endforeach

        <script>
            function showform(ele) {
                var id = ele.id;
                var num = id.split('_');
                var form_div = document.getElementById('response_form_' + num[num.length - 1]);
                if (form_div.style.display == 'none') {
                    form_div.style.display = 'block';
                }
                else {
                    form_div.style.display = 'none';
                }
            }

            function showresponse(ele) {
                var id = ele.id;
                var num = id.split('_');
                var response_div = document.getElementById('response_div_' + num[num.length - 1]);
                if (response_div.style.display == 'none') {
                    response_div.style.display = 'block';
                }
                else {
                    response_div.style.display = 'none';
                }
            }


        </script>
</body>

</html>