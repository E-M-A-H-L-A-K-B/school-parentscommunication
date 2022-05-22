<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Parents Feedback</h2>
    @foreach($feedbacks as $feedback)
        <p>--Parents Of {{$feedback->student->name}} {{$feedback->student->father}} {{$feedback->student->last_name}} From Class {{$feedback->section->SClass->num}} Section {{$feedback->section->num}}:</p>
            <p>{{$feedback->content}}</p>
           <p>--{{$feedback->created_at}}</p>
           
           @if(!$feedback->responded)
           <button id="response_button_{{$feedback->id}}" onclick="showform(this)">Respond To Feedback</button>
            <div id="response_form_{{$feedback->id}}" style="display: none;">
                <form action="{{route('feedback.respondtoparent',['id'=>$feedback->id])}}" method="post">
                    @csrf
                    <input type="submit" value="Respond"><br>
                    <textarea name="response" id="" cols="30" rows="10"></textarea>
                </form>
            </div>
           @else
           <button id="response_button_{{$feedback->id}}" onclick="showresponse(this)">Show Response</button>
            <div id="response_div_{{$feedback->id}}" style="display: none;">
                <p>{{$feedback->response->content}}</p>
                <p>{{$feedback->response->created_at}}</p>
            </div>
           @endif
        <hr>
    @endforeach

    <script>
        function showform(ele)
        {
            var id = ele.id;
            var num = id.split('_');
            var form_div = document.getElementById('response_form_'+num[num.length-1]);
            if(form_div.style.display == 'none')
            {
                form_div.style.display = 'block';
            }
            else
            {
                form_div.style.display = 'none';
            }
        }

        function showresponse(ele)
        {
            var id = ele.id;
            var num = id.split('_');
            var response_div = document.getElementById('response_div_'+num[num.length-1]);
            if(response_div.style.display == 'none')
            {
                response_div.style.display = 'block';
            }
            else
            {
                response_div.style.display = 'none';
            }
        }
    </script>
</body>
</html>