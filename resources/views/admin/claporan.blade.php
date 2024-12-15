<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pesanan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Pesanan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. WA</th>
                <th>Tanggal</th>
                <th>Nomor Resi</th>
                <th>Total Harga</th>
                <th>Kelas Bis</th>
                <th>Tujuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ps as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->wa }}</td>
                    <td>{{ $p->tanggal }}</td>
                    <td>{{ $p->resi }}</td>
                    <td>{{ $p->total }}</td>
                    <td>{{ $p->kelas }}</td>
                    <td>{{ $p->tujuan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
