<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>genres</title>
</head>
<body>
 <table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Genre</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($genres as $itemg => $genre)
        <tr>
            <td>{{ $itemg + 1 }}</td>
            <td>{{ $genre['name'] }}</td>
            <td>{{ $genre['description'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>