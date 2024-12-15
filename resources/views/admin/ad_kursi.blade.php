@extends('admin.master')
@section('title', 'Kursi')
@section('judul', 'kursi')
@section('content')
    <div class="w-[1000px] flex flex-wrap gap-2 place-content-center mt-5">

        @foreach ($kr as $index => $j)
            @if ($j->status == 'terisi')
                <a href="{{ route('kosong', ['id' => $j->id_kursi]) }}""
                    class="h-12 w-12 bg-red-500 rounded-lg text-center grid place-content-center disabled">
                    {{ $j->nomor_kursi }}
                </a>
            @else
                <button class="h-12 w-12 bg-gray-300 rounded-lg text-center grid place-content-center">
                    {{ $j->nomor_kursi }}
                </button>
            @endif
        @endforeach

    </div>
@endsection
