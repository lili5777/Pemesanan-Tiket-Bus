@extends('main')
@section('title', 'Reservasi')
@section('konten')
    <div class="h-screen">
        <h1 class="text-center mt-10 bg-yellow-400 rounded-lg text-white font-bold text-2xl p-5 mx-80 ">SILAHKAN ISI DATA ANDA</h1>
        <form action="{{route('pesan')}}" method="POST">
        @csrf
        <div class="mt-10 w-full" id="form1">
            <div class="flex justify-center gap-24 pb-3">
                <div>
                    <h1 class="text-slate-700 font-bold pb-1 pl-2">Nama Lengkap</h1>
                    <input required type="text" name="nama" class="rounded-lg w-64 h-8 px-2">
                </div>
                <div>
                    <h1 class="text-slate-700 font-bold pb-1 pl-2">Alamat</h1>
                    <input required type="text" name="alamat" class="rounded-lg w-64 h-8 px-2">
                </div>
            </div>
            <div class="flex justify-center gap-24 pb-3">
                <div>
                    <h1 class="text-slate-700 font-bold pb-1 pl-2">Nomor Telepon</h1>
                    <input type="text" required name="wa" class="rounded-lg w-64 h-8 px-2">
                </div>
                <div>
                    <h1 class="text-slate-700 font-bold pb-1 pl-2">Tanggal Berangkat</h1>
                    <input type="date" required name="tanggal" class="rounded-lg w-64 h-8 px-2">
                </div>
            </div>
            <div class="flex justify-center gap-24 pb-3">
                <div>
                    <h1 class="text-slate-700 font-bold pb-1 pl-2">Tujuan</h1>
                    <select id="tujuan" name="id_jadwal" class="rounded-lg w-64 h-8 px-2">
                        <option value="">Pilih Penjemputan</option>
                        @foreach ($jadwal as $a)
                            <option value="{{ $a->id_jadwal }}">{{ $a->tujuan }} || {{ $a->pukul }}</option>
                        @endforeach
                    </select>
                </div>
                <div >
                    <h1 class="text-slate-700 font-bold pb-1 pl-2">Kelas </h1>
                    <select id="kelas" name="id_bus" class="rounded-lg w-64 h-8 px-2">
                        <option value="">Pilih Kelas</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-center gap-24 pb-3">
                <div>
                    <button type="submit"  class="px-5 py-3 mt-5 ml-[480px] rounded-md hover:bg-yellow-500 shadow-md bg-yellow-400 text-white font-bold">Selanjutnya</button>
                </div>
            </div>
        </div>
    </form>
    <center>
        @if (session('alert'))
                <div class="mt-5 mx-96 py-5 bg-green-400 border-2 border-green-600 text-green-900 rounded-lg">
                    {{ session('alert') }}
                </div>
            @endif
    </center>
    </div>
    
@endsection