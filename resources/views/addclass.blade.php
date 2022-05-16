<html>

<head>
    <title> Html CRUD with Pure JavaScript </title>
    <link rel="stylesheet" href="{{URL::asset('css/addclass.css')}}">
</head>

<body>


    <table class="list" id="employeeList">
    <caption>
            present classes
        </caption>
        <thead>
                <th>class Name</th><th></th></thead>
    @foreach($classes as $class)
    <tr>
        @if($class->num == 1)
            <td>first</td>
        @elseif($class->num == 2)
            <td>Second</td>
        @elseif($class->num == 3)
            <td>Third</td>
        @elseif($class->num == 4)
            <td>Fourth</td>
        @elseif($class->num == 5)
            <td>Fifth</td>
        @elseif($class->num == 6)
            <td>Sixth</td>
        @elseif($class->num == 7)
            <td>Seventh</td>
        @elseif($class->num == 8)
            <td>Eigth</td>
        @elseif($class->num == 9)
            <td>Nineth</td>
        @elseif($class->num == 10)
            <td>Tenth</td>
        @elseif($class->num == 11)
            <td>Eleventh</td>
        @elseif($class->num == 12)
            <td>Twelveth</td>
        @endif
        <td><button><a href="{{route('structure.deleteclass',['id'=>$class->num,])}}">Delete</a></button></td>
    </tr>
    @endforeach

            <tbody> </tbody>
    </table>


    <form action="{{route('structure.storeclass')}}" method="post" autocomplete="off">
        <div>
        @csrf
        Class Number:<input type="number" name="class_number">
        <input type="submit" value="Submit"><br>
        @if(Session::has('number_error'))
            <span><small style="color: red;">{{ Session::get('number_error') }}</small></span><br>
        @elseif(Session::has('class_exist'))
            <span><small style="color: red;">{{ Session::get('class_exist') }}</small></span><br>
        @endif
        </div>





        <div class="form-action-buttons">

    </form>




    <!--<script src="{{URL::asset('js/addclass.js')}}"></script>-->
</body>

</html>