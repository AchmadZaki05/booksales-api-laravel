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
        @foreach ($authors as $itema => $author)
        <tr>
            <td>{{ $itema + 1 }}</td>
            <td>{{ $author['name'] }}</td>
            <td>{{ $author['birth_year'] }}</td>
            <td>{{ $author['nationality'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>