<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>School Announcements</h2>
    <hr>
    <table>
    @foreach($announs as $announ)
        <tr>
            <td>{{ $announ->content }}</td>
            <td>    {{ Timezone::convertToLocal($announ->created_at) }}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>