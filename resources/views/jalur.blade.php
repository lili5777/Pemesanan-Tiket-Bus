@extends('main')
@section('title', 'Info Jalur')
@section('konten')
    <div class="flex h-screen">
        <div class="w-1/2 grid place-items-center">
            <img src="{{ asset('gambar/busj.png') }}" alt="" class="w-96" data-aos="zoom-in" data-aos-duration="1500"
                data-aos-delay="400">
        </div>
        <div class="w-1/2 text-center ">
            <h1 class="font-bold text-4xl text-white bg-yellow-500 mx-20 mt-24 py-2 rounded-xl mb-5" data-aos="zoom-in" data-aos-duration="1600"
                data-aos-delay="500">BUS MAKASSAR</h1>
            <center>
            <table class="border-2 border-white w-3/4 bg-yellow-500 text-white" data-aos="zoom-in" data-aos-duration="1700"
                data-aos-delay="600">
                <tr class="border-2 border-white">
                    <th class="border-2 border-white">Tujuan</th>
                    <th class="border-2 border-white">Pukul</th>
                    <th class="border-2 border-white">Harga Ekonomi</th>
                    <th class="border-2 border-white">Harga Eklusif</th>
                </tr>
                @foreach ($data as $a)
                <tr class="border-2 border-white text-center">
                    <td class="border-2 border-white">{{$a->tujuan}}</td>
                    <td class="border-2 border-white">{{$a->pukul}}</td>
                    <td class="border-2 border-white">{{ $bis->where('id_jadwal', $a->id_jadwal)->first()->harga }}</td>
                    <td class="border-2 border-white">{{ $bis->where('id_jadwal', $a->id_jadwal)->last()->harga }}</td>
                </tr>
                @endforeach
            </table>
            </center>
        </div>

    </div>
@endsection
