<!-- admin.ad_jadwal.blade.php -->
@extends('admin.master')
@section('title', 'Data Jadwal')
@section('judul', 'Data Jadwal')
@section('content')
    <div class="w-[1000px] grid place-content-center">
        <table class="border border-black text-center mt-10">
            <tr class="border border-black">
                <td class="border  border-black">No</td>
                <td class="border  border-black">Tanggal</td>
                <td class="border border-black">Tujuan</td>
                <td class="border border-black">Pukul</td>
                <td class="border border-black">Kelas</td>
                <td class="border border-black">Harga</td>
                <td class="border  border-black">Action</td>
            </tr>
            @foreach ($jd as $index => $j)
                <tr>
                    <td class="border px-5 border-black">{{ $index + 1 }}</td>
                    <td class="border px-10 border-black">{{ $j->tanggal }}</td>
                    <td class="border px-10 border-black">{{ $j->tujuan }}</td>
                    <td class="border px-5 border-black">{{ $j->pukul }}</td>
                    <td class="border px-5 border-black">{{ $j->kelas }}</td>
                    <td class="border px-5 border-black">{{ $j->harga }}</td>
                    <td class="border py-4 px-3 border-black flex gap-2">
                        <a href="{{ route('edit_jadwal', ['id' => $j->id_bis]) }}"
                            class="bg-yellow-300 my-2 px-3 rounded-lg hover:bg-yellow-400 text-white shadow-md font-bold">Edit</a><br><br>
                        <a href="#"
                            class="bg-red-500 my-2 px-3 rounded-lg hover:bg-red-600 text-white shadow-md font-bold">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
