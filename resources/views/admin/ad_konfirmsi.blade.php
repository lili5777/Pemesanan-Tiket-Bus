@extends('admin.master')
@section('title','Konfirmasi Pesanan')
@section('judul','Konfirmasi Pesanan')
@section('content')
    <div class="w-[1000px]">
        <center>
            @if (session('success'))
                <div class="mt-5 mx-96 py-5 bg-green-400 border-2 border-green-600 text-green-900 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
        <table class="border border-black text-center mt-10">
            <tr class="border border-black">
                <td class="border border-black w-10">No</td>
                <td class="border border-black w-40">Nama</td>
                <td class="border border-black w-40">Nomor Resi</td>
                <td class="border border-black w-60">Bukti</td>
                <td class="border border-black w-32">Action</td>
            </tr>

            @foreach ($con as $no => $k )
            <tr>
                <td class="border border-black">{{$no+1}}</td>
                <td class="border border-black">{{$k->nama}}</td>
                <td class="border border-black">{{$k->resi}}</td>
                <td class="border border-black"><img src="{{ asset('gambar/' . $k->bukti) }}" alt="Bukti Transfer"></td>
                <td class="border border-black">
                    <a href="{{ route('accept', ['id' => $k->id_pesanan,'idk'=>$k->id_konfirmasi]) }}" class="bg-yellow-300 py-2 px-2 rounded-lg hover:bg-yellow-400 text-white shadow-md font-bold">Konfirmasi</a><br><br>
                    <a href="{{ route('riject', ['resi' => $k->resi,'id'=>$k->id_konfirmasi]) }}" class="bg-red-500 py-2 px-3 rounded-lg hover:bg-red-600 text-white shadow-md font-bold">Tolak</a>
                </td>
            </tr>  
            @endforeach
            
        </table>
        </center>

    </div>
@endsection