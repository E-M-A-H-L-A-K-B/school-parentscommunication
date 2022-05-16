<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Guides:</h2>
    @foreach($guides as $guide)
        <p>{{ $guide->name }} {{ $guide->father }} {{ $guide->last_name }} <button><a href="{{route('structure.guide.sections',['id'=>$guide->id])}}">Edit Sections</a></button></p>
    @endforeach
</body>
</html>