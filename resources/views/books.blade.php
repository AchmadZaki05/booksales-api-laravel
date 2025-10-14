<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>
    <h1>Data Books</h1>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Cover</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $itemb)
            <tr>
                <td>{{ $itemb['id'] }}</td>
                <td>{{ $itemb['title'] }}</td>
                <td>{{ $itemb['description'] }}</td>
                <td>{{ $itemb['price'] }}</td>
                <td>{{ $itemb['stock'] }}</td>
                <td>{{ $itemb['cover_photo'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
