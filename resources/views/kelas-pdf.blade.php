<!DOCTYPE html>
<html>
<head>
    <title>Data Kelas</title>
    <style>
        h3 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px;
            font-size: 12px;
        }

        th {
            background: #eee;
        }
    </style>
</head>
<body>
    <h3>Data Kelas</h3>
    <table>
        <thead>
            <tr>
                <th>ID Kelas</th>
                <th>Nama Kelas</th>
                <th>Tingkat</th>
                <th>Wali Kelas</th>
                <th>Jumlah Siswa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $k)
            <tr>
                <td>{{ $k->id_kelas }}</td>
                <td>{{ $k->nama_kelas }}</td>
                <td>{{ $k->tingkat }}</td>
                <td>{{ $k->wakes }}</td>
                <td>{{ $k->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
