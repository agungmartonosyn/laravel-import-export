<!DOCTYPE html>
<html>

<head>
    <title>DOMPDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Nomor HP</th>
                <th>Tanggal Lahir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataSiswa as $siswa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->nomor_hp }}</td>
                <td>{{ $siswa->tanggal_lahir }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
