<html lang="en ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link href="{{URL::asset('css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/Viewmarks.css')}}">
    <title>View Marks</title>
</head>

<body>
    <a href="structuremain.html"> <i id="left" class="fas fa-arrow-alt-circle-left"></i></a>
    <div class="container">
        <div id="logo">
            <img src="{{URL::asset('img/logo_fixed.png')}}">
        </div>
    </div>
    <label>
            <ul>
                   <li>L</li>
                <li>I</li>
                <li>S</li>
                 <li>T</li>
                    <li>_</li>
               
                
                <li>O</li>
                 <li>F</li>
                 
                <li>_</li>
                
                <li>My</li>
                <li>_</li>
                <li>Marks</li>
                
                
            </ul>

        </label>
    <div class="dots">
        <div class="dot" style="--i:0;"></div>
        <div class="dot" style="--i:1;"></div>
        <div class="dot" style="--i:2;"></div>
        <div class="dot" style="--i:3;"></div>
        <div class="dot" style="--i:4;"></div>
        <div class="dot" style="--i:5;"></div>
        <div class="dot" style="--i:6;"></div>
    </div>

    <table>
        <tr>
            <th>Subject</th>
            <th>Mark
            </th>

        </tr>
        @foreach($grades as $grade)
            <tr>
                <td>{{$grade->subject->name}}</td>
                <td>{{$grade->number}}</td>

            </tr>
        @endforeach
        <tr>
            <td>arabic</td>
            <td>50</td>

        </tr>
        <tr>
            <td>arabic2</td>
            <td>40</td>

        </tr>
        <tr>
            <td>arabic3</td>
            <td>30</td>

        </tr>
        <tr>
            <td>arabic4</td>
            <td>70</td>

        </tr>
    </table>
    <br>



</body>

</html>