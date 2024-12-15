<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <center>
        <h1>TIKET BUS</h1>
    </center>
    <table>
        <tr>
            <td>Nomor Resi</td>
            <td>:</td>
            <td>{{ $tiket->resi }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $tiket->nama }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $tiket->alamat }}</td>
        </tr>
        <tr>
            <td>Tujuan</td>
            <td>:</td>
            <td>{{ $jadwal->tujuan }}</td>
        </tr>
        <tr>
            <td>Tanggal Berangkat</td>
            <td>:</td>
            <td>{{ $tiket->tanggal }}</td>
        </tr>
        <tr>
            <td>Pukul</td>
            <td>:</td>
            <td>{{ $jadwal->pukul }} WITA</td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td class="font-bold">{{ $bus->kelas }}</td>
        </tr>
        <tr>
            <td>Kursi Pesanan</td>
            <td>:</td>
            <td class="font-bold">
                @foreach ($kursi as $k)
                    {{ $k->nomor_kursi }},
                @endforeach
            </td>
        </tr>
        <tr>
            <td>Total Harga</td>
            <td>:</td>
            <td class="font-bold">Rp.{{ $tiket->total }}</td>
        </tr>
    </table>

</body>

</html>
