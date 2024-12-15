@extends('main')
@section('title', 'Detail')
@section('konten')
    <div class="h-screen"">
        <h1 class="text-center text-4xl mt-5 mb-5">Detail Pesanan</h1>
        <center>
        <div class="bg-yellow-400 mx-96 py-5 rounded-xl">
        <table >
            <tr>
                <td class="w-44">No Resi</td>
                <td class="w-5">:</td>
                <td class="font-bold">{{ $pesanan->resi }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td class="font-bold">{{ $pesanan->nama }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td class="font-bold">{{ $pesanan->alamat }}</td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td>:</td>
                <td class="font-bold">{{ $jadwal->tujuan }}</td>
            </tr>
            <tr>
                <td>Tanggal Berangkat</td>
                <td>:</td>
                <td class="font-bold">{{ $pesanan->tanggal }}</td>
            </tr>
            <tr>
                <td>Pukul</td>
                <td>:</td>
                <td class="font-bold">{{$jadwal->pukul}} WITA</td>
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
                        {{ $k->nomor_kursi }}
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td>:</td>
                <td class="font-bold">Rp.{{ $pesanan->total }}</td>
            </tr>
        </table>
        </div><br>
        <a href="{{ route('konfirmasi') }}" class="bg-yellow-500 p-3 rounded-lg hover:bg-yellow-600 text-white font-bold">Konfimasi Pembayaran</a>
        </center>
    </div>
@endsection
