<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>

<body>
    <div class="w-full flex">
        <div class="bg-[#092635] w-1/4   pb-96 shadow-md">
            <div class="grid place-items-center mt-5">
                <img src="{{ asset('gambar/zaily.png') }}" alt="" class="w-32">
                <div class="w-48 h-px bg-gray-300 my-4"></div>
            </div>
            <h1 class="text-white font-bold pl-10 hover:text-cyan-600 mb-5 hover:pl-14"><a href="/admin">Dashboard</a>
            </h1>
            <h1 class="text-white font-bold pl-10 hover:text-cyan-600 mb-5 hover:pl-14""><a
                    href="{{ route('datapesanan') }}">Data Pesanan</a></h1>
            <h1 class="text-white font-bold pl-10 hover:text-cyan-600 mb-5 hover:pl-14""><a
                    href="{{ route('datajadwal') }}">Data Jadwal</a></h1>
            {{-- <h1 class="text-white font-bold pl-10 hover:text-cyan-600 mb-5 hover:pl-14""><a
                    href="{{ route('kkursi') }}">Data Kursi</a></h1> --}}
            <h1 class="text-white font-bold pl-10 hover:text-cyan-600 mb-5 hover:pl-14""><a
                    href="{{ route('ad_konfirmasi') }}">Konfirmasi Pesanan</a></h1>
            <h1 class="text-white font-bold pl-10 hover:text-cyan-600 mb-5 hover:pl-14""><a
                    href="{{ route('ad_tolak') }}">Konfirmasi Di Tolak</a></h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="text-white font-bold pl-10 hover:text-cyan-600 mb-5 hover:pl-14">Logout</button>
            </form>
        </div>
        <div>
            <div class=" bg-gray-300 w-[1000px] text-center py-7 font-bold text-2xl text-gray-600 shadow-xl">
                <h1>@yield('judul')</h1>
            </div>
            @yield('content')
        </div>




    </div>


</body>

</html>
