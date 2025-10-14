<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>author</title>
</head>
<body>
    <table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>tahun lahir</th>
            <th>negara</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($authors as $itema)
        <tr>
            <td>{{ $itema['id'] }}</td>
            <td>{{ $itema['name'] }}</td>
            <td>{{ $itema['birth_year'] }}</td>
            <td>{{ $itema['nationality'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>