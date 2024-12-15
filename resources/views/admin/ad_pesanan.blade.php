@extends('admin.master')
@section('title', 'Data Pesanan')
@section('judul', 'Data Pesanan')
@section('content')
    <div class="w-[1000px]">
        <center>
            @if (session('success'))
                <div class="mt-5 mx-96 py-5 bg-green-400 border-2 border-green-600 text-green-900 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('cetak_laporan') }}" method="POST" class="mt-10">
                @csrf
                <label for="month">Pilih Bulan:</label>
                <input type="month" id="month" name="month" required>
                <button type="submit"
                    class="bg-blue-500 py-2 px-4 rounded-lg hover:bg-blue-600 text-white shadow-md font-bold ml-2">Cetak
                    Laporan</button>
            </form>
            <table class="border border-black text-center mt-10">
                <tr class="border border-black">
                    <td class="border border-black ">No</td>
                    <td class="border border-black ">Nomor Resi</td>
                    <td class="border border-black ">Nama</td>
                    <td class="border border-black ">Alamat</td>
                    <td class="border border-black ">Tanggal Berangkat</td>
                    <td class="border border-black ">No.WA</td>
                    <td class="border border-black ">Total Harga</td>
                    <td class="border border-black w-32 ">Action</td>
                </tr>

                @foreach ($data as $no => $k)
                    <tr>
                        <td class="border border-black">{{ $no + 1 }}</td>
                        <td class="border border-black">{{ $k->resi }}</td>
                        <td class="border border-black">{{ $k->nama }}</td>
                        <td class="border border-black">{{ $k->alamat }}</td>
                        <td class="border border-black">{{ $k->tanggal }}</td>
                        <td class="border border-black">{{ $k->wa }}</td>
                        <td class="border border-black">{{ $k->total }}</td>
                        <td class="border border-black h-28">

                            <a href="{{ route('hapus_pesanan', ['id' => $k->id_pesanan]) }}"
                                class="bg-red-500 py-2 px-3 rounded-lg hover:bg-red-600 text-white shadow-md font-bold">Hapus</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </center>

    </div>
@endsection
