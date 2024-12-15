@extends('admin.master')
@section('title', 'Dashboard')
@section('judul', 'Dashboard')
@section('content')
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Pesanan Card -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Pesanan</h2>
                <p class="text-gray-600">{{ $pesan }}</p>
            </div>
            <!-- Jadwal Card -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Jadwal</h2>
                <p class="text-gray-600">{{ $jadwal }}</p>
            </div>
            <!-- Konfirmasi Pesanan Card -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Konfirmasi Pesanan</h2>
                <p class="text-gray-600">{{ $konfirmasi }}</p>
            </div>
            <!-- Konfirmasi Ditolak Card -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Konfirmasi Ditolak</h2>
                <p class="text-gray-600">{{ $tolak }}</p>
            </div>
        </div>
    </div>
@endsection
