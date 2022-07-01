<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/My_Feedback.css')}}">
    <title>My Feedback</title>
</head>

<body>
    <a href="structuremain.html"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <div class="container">
        <div id="logo">
            <img src="{{URL::asset('img/logo_fixed.png')}}">
        </div>
    </div>

    <h2>My Feedback</h2>
    @foreach($feedbacks as $feedback)
        <section id="My_Feedback">


            <div id="box">
                <span></span>
                <div id="contentt">
                    @if(!$parent)
                        <p id="send-to">Sent To : {{$feedback->student->name}} {{$feedback->student->father}} {{$feedback->student->last_name}}
                            <p id="from">from Class {{$feedback->student->class_num}} Section {{$feedback->student->section->num}}</p>
                        </p>
                    @endif
                    <p id="feed-cont">{{$feedback->content}}</p>
                    <p id="feed-created-at">{{$feedback->created_at->format('Y-M-d H:i')}}</p>

                    <button class="Show" id="response_button_{{$feedback->id}}" onclick="showresponse(this)">Show
                        Response</button>

                    @if(!$feedback->responded)
                        <div id="response_div_{{$feedback->id}}" style="display: none;">
                            <p id="feed-response-cont">No Response yet</p>
                        </div>
                    @else
                        <div id="response_div_{{$feedback->id}}" style="display: none;">
                            <p id="feed-response-cont">{{$feedback->response->content}}</p>
                            <p id="feed-response-create">{{$feedback->response->created_at->format('Y-M-d H:i')}}</p>
                        </div>
                    @endif
                    <hr>
                </div>
            </div>


        </section>
    @endforeach
    <script>
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