<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>My Feedback:</h2>
@foreach($feedbacks as $feedback)
         @if($parent)
         <p>{{$feedback->content}}</p>
            <p>--{{$feedback->created_at}}</p>
         @else
         <p>{{$feedback->content}}</p>
         <p>sent To: {{$feedback->student->name}} {{$feedback->student->father}} {{$feedback->student->last_name}} from Class {{$feedback->student->class_num}} Section {{$feedback->student->section->num}}</p>
            <p>--{{$feedback->created_at}}</p>
         @endif
         <button id="response_button_{{$feedback->id}}" onclick="showresponse(this)">Show Response</button>
           @if(!$feedback->responded)
           <div id="response_div_{{$feedback->id}}" style="display: none;">
                <p>No Response yet</p>
            </div>
           @else
            <div id="response_div_{{$feedback->id}}" style="display: none;">
                <p>{{$feedback->response->content}}</p>
                <p>{{$feedback->response->created_at}}</p>
            </div>
           @endif
        <hr>
    @endforeach

    <script>
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