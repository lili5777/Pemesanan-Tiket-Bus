@extends('main')
@section('title', 'pilih kursi')
@section('konten')
    <div class="mt-10 w-full h-screen" id="form2">
        <h1 class="text-center text-yellow-700 pb-3">Pilih Kursi</h1>
        <div>
            <div class="flex flex-wrap mx-[400px] gap-3 pb-10" id="kursiButtons">
                <!-- Menampilkan tombol kursi yang diterima dari controller -->
                @foreach ($kursi as $k)
                    @if ($k->status == 'terisi')
                        <button class="h-12 w-12 bg-red-500 rounded-lg text-center grid place-content-center" disabled>
                            {{ $k->nomor_kursi }}
                        </button>
                    @else
                        <button class="h-12 w-12 bg-gray-300 rounded-lg text-center grid place-content-center"
                            data-id="{{ $k->id_kursi }}" onclick="selectSeat(this)">
                            {{ $k->nomor_kursi }}
                        </button>
                    @endif
                @endforeach
            </div>
            {{-- <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded" >Simpan Pilihan</button> --}}
        </div>
        
        <div class="flex justify-center gap-24 pb-3">
            <div>
                <button class="px-5 py-3 mt-5 ml-[480px] rounded-md hover:bg-yellow-500 shadow-md bg-yellow-400 text-white font-bold" onclick="submitSeats()">Selanjutnya</button>
            </div>
            <form id="kursi-form" action="{{ route('simpankursi') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="kursi_ids" id="kursi_ids">
        </form>
        </div>
    </div>
@endsection
