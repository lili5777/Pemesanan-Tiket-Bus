@extends('main')
@section('title', 'Konfirmasi')
@section('konten')
    <div class="h-screen">
        <center>
            <h1 class="text-4xl mt-5  font-bold mb-5">Konfirmasi Pembayaran</h1>
            <div class=" bg-yellow-400 mx-96 py-5">
                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1 class="  font-bold mb-5">Masukan Nomor Resi</h1>
                    <input type="text" name="resi" id="resi" required
                        class="border-solid border-2 border-black rounded-lg px-2" placeholder="EK1293735"><br><br>
                    <h1 class="  font-bold mb-5">Masukan Bukti Pembayaran</h1>
                    <input type="file" name="bukti" id="bukti" required
                        class="border-solid border-2 border-black rounded-lg bg-white w-48"><br><br>
                    <button type="submit"
                        class="border-double border-4 border-white p-2 rounded-xl hover:bg-yellow-800 bg-yellow-600">Konfirmasi</button>
                </form>
            </div>
            @if (session('alert'))
                <div class="mt-5 mx-96 py-5 bg-green-400 border-2 border-green-600 text-green-900 rounded-lg">
                    {{ session('alert') }}
                </div>
            @endif
        </center>
    </div>
@endsection
