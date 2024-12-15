@extends('main')
@section('title', 'Cekproses')
@section('konten')
    <div class="h-screen">
        <center>
            <h1 class="text-4xl mt-5  font-bold mb-5">Cek Proses</h1>
            <div class="mt-28 bg-yellow-400 mx-96 py-5">
                <h1 class="  font-bold mb-5">Masukan Nomor Resi</h1>
                <form action="{{ route('cekji') }}" method="GET">
                    <input type="text" name="search" id=""
                        class="border-solid py-2 border-2 border-black rounded-lg px-2" placeholder="EK1293735">
                    <button type="submit"
                        class="border-double border-4 w-20 text-white font-bold border-white p-2 rounded-xl hover:bg-yellow-800 bg-yellow-600">Cek</button>
                </form>
            </div>

            @if (session('alert'))
                <div class="mt-5 mx-96 py-5 bg-green-400 border-2 border-green-600 text-green-900 rounded-lg">
                    {!! session('alert') !!}
                </div>
            @endif
            {{-- @if ($data->isNotEmpty())
                <div class="mt-5">
                    <h2 class="text-2xl font-bold">Status: {{ $data->keterangan }}</h2>
                </div>
            @else
                <div class="mt-5 text-red-500 font-bold">Resi tidak ditemukan</div>
            @endif --}}

        </center>
    </div>
@endsection
