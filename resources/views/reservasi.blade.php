@extends('main')
@section('title', 'Reservasi')
@section('konten')
    <div class="h-screen">
        <h1 class="text-center mt-10 bg-yellow-400 rounded-lg text-white font-bold text-2xl p-5 mx-80 ">SILAHKAN ISI DATA ANDA</h1>
        <form method="POST" action="/submit-order">
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
                    <select name="tujuan" id="tujuan" name="id_jadwal" class="rounded-lg w-64 h-8 px-2">
                        <option value="">Pilih Penjemputan</option>
                        @foreach ($jadwal as $a)
                            <option value="{{ $a->id_jadwal }}">{{ $a->tujuan }} || {{ $a->pukul }}</option>
                        @endforeach
                    </select>
                </div>
                <div >
                    <h1 class="text-slate-700 font-bold pb-1 pl-2">Kelas </h1>
                    <select name="kelas" id="kelas" name="id_bus" class="rounded-lg w-64 h-8 px-2">
                        <option value="">Pilih Kelas</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-center gap-24 pb-3">
                <div>
                    <button type="button" onclick="next()" class="px-5 py-3 mt-5 ml-[480px] rounded-md hover:bg-yellow-500 shadow-md bg-yellow-400 text-white font-bold">Selanjutnya</button>
                </div>
            </div>
        </div>

        <div class="mt-10 w-full hidden" id="form2">
            <h1 class="text-center text-yellow-700 pb-3">Pilih Kursi</h1>
            <div>
                <div class="flex flex-wrap mx-[400px] gap-3 pb-10" id="kursiButtons">
                    <!-- Menampilkan tombol kursi yang diterima dari controller -->
                </div>
            </div>
            <div class="flex justify-center gap-96 pb-3">
                <div>
                    <button type="button" onclick="back()" class="w-32 py-3 mt-5 rounded-md hover:bg-yellow-500 shadow-md bg-yellow-400 text-white font-bold">Kembali</button>
                </div>
                <div>
                    <button type="button" onclick="next()" class="w-32 py-3 mt-5 rounded-md hover:bg-yellow-500 shadow-md bg-yellow-400 text-white font-bold">Selanjutnya</button>
                </div>
            </div>
        </div>

        <div class="mt-10 w-full hidden" id="form3">
            <h1 class="text-center text-yellow-700 pb-3">Detail Pesanan</h1>
            <div id="orderSummary" class="text-center text-slate-700"></div>
            <div class="flex justify-center gap-96 pb-3">
                <div>
                    <button type="button" onclick="back()" class="w-32 py-3 mt-5 rounded-md hover:bg-yellow-500 shadow-md bg-yellow-400 text-white font-bold">Kembali</button>
                </div>
                <div>
                    <button type="button" onclick="submitOrder()" class="w-32 py-3 mt-5 rounded-md hover:bg-yellow-500 shadow-md bg-yellow-400 text-white font-bold">Pilih</button>
                </div>
            </div>
        </div>

        </form>
    </div>
    @endsection
