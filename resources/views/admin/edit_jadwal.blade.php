<!-- admin.edit_jadwal.blade.php -->
@extends('admin.master')
@section('title', 'Edit Jadwal')
@section('judul', 'Edit Jadwal')
@section('content')
    <div class="w-[1000px] mx-auto mt-10">
        <form action="{{ route('update_jadwal', ['id' => $data->id_bis]) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label for="tujuan">Tujuan:</label>
            <input type="text" name="tujuan" id="tujuan" value="{{ $data->tujuan }}" class="border border-gray-300 px-3 py-2 w-full mb-3">

            <label for="pukul">Pukul:</label>
            <input type="text" name="pukul" id="pukul" value="{{ $data->pukul }}" class="border border-gray-300 px-3 py-2 w-full mb-3">

            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" id="kelas" value="{{ $data->kelas }}" class="border border-gray-300 px-3 py-2 w-full mb-3">

            <label for="harga">Harga:</label>
            <input type="text" name="harga" id="harga" value="{{ $data->harga }}" class="border border-gray-300 px-3 py-2 w-full mb-3">

            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ $data->tanggal }}" class="border border-gray-300 px-3 py-2 w-full mb-3">

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Update</button>
        </form>
    </div>
@endsection
