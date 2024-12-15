@extends('main')
@section('title', 'Home')
@section('konten')
    {{-- jumbotron --}}
    <div class="flex ">
        <div class="w-1/2 pl-40 pt-32">
            <h1 class="text-4xl font-bold" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="400">Selamat Datang Di
                Website Reservasi Tikert Bus</h1>
            <p class="text-gray-500 pt-5 pb-6" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="600">Lorem ipsum
                dolor sit amet consectetur adipisicing elit. Quibusdam optio repellat magnam ex cupiditate expedita natus
                dolorum mollitia consequuntur accusamus, minima excepturi eius! Consequatur illo soluta, blanditiis
                reprehenderit quae magnam!</p>
            <div class="flex gap-5">
                <a href=""
                    class="py-2 px-4 border-double border-4 border-white bg-yellow-400 rounded-lg hover:bg-yellow-500"
                    data-aos="fade-up" data-aos-duration="1500" data-aos-delay="800">Reservasi</a>
                <a href=""
                    class="py-2 px-4 border-double border-4 border-white bg-yellow-400 rounded-lg hover:bg-yellow-500"
                    data-aos="fade-up" data-aos-duration="1500" data-aos-delay="900">Informasi</a>
            </div>
        </div>
        <div class="w-1/2 grid place-items-center">
            <img src="{{ asset('gambar/bus.png') }}" alt="" class="w-96" data-aos="zoom-in"
                data-aos-duration="1500" data-aos-delay="400">
        </div>
    </div>


    {{-- konten --}}
    <div data-aos="fade-up" data-aos-duration="1500" data-aos-delay="600">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#FFC700" fill-opacity="1"
                d="M0,192L60,202.7C120,213,240,235,360,229.3C480,224,600,192,720,165.3C840,139,960,117,1080,122.7C1200,128,1320,160,1380,176L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
            </path>
        </svg>
        <div class="bg-[#FFC700] pt-10 pb-20">
            <h1 class="text-center text-white text-4xl font-bold underline underline-offset-8 decoration-4 pb-5">KELEBIHAN
                LAYANAN KAMI
            </h1>
            <div class="flex justify-center text-center py-5 px-10 gap-9">
                <div class="bg-[#ffaa00] p-5 rounded-lg border-double border-4 border-[#FFC700] " data-aos="fade-up"
                    data-aos-duration="1000"">
                    <center>
                        <img src="{{ asset('gambar/shopping.png') }}" alt="" class="w-20">
                    </center>
                    <h1 class="font-bold text-2xl text-white mb-3">Tanpa Biaya Tambahan</h1>
                    <p class="text-white">Pesan tiket bis anda dengan harga terbaik</p>
                </div>
                <div class=" bg-[#ffaa00] p-5 rounded-lg border-double border-4 border-[#FFC700]" data-aos="fade-up"
                    data-aos-duration="1000" data-aos-delay="200">
                    <center>
                        <img src="{{ asset('gambar/hand.png') }}" alt="" class="w-20">
                    </center>
                    <h1 class="font-bold text-2xl text-white mb-3">Pembayaran Aman</h1>
                    <p class="text-white">Bayar tiket anda dengan cara yang aman dan nyaman</p>
                </div>
                <div class=" bg-[#ffaa00] p-5 rounded-lg border-double border-4 border-[#FFC700]" data-aos="fade-up"
                    data-aos-duration="1000" data-aos-delay="400">
                    <center>
                        <img src="{{ asset('gambar/armchair.png') }}" alt="" class="w-20">
                    </center>
                    <h1 class="font-bold text-2xl text-white mb-3">Pilih Tempat Duduk</h1>
                    <p class="text-white">Pesan tempat duduk sesuai pilihan anda</p>
                </div>
            </div>
        </div>
        {{-- <div class="bg-[#5b8b95] pt-10">
            <h1 class="text-center text-white text-4xl font-bold underline underline-offset-8 decoration-4 pb-5">PANDUAN
            </h1>
            <div class="flex justify-center text-center py-5 px-10 gap-9">
                <div class=" py-3 ">
                    <h1 class="font-bold text-2xl text-white mb-3">Pilih Surat</h1>
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum placeat
                        blanditiis nostrum, ipsa nesciunt perferendis deleniti odio corporis ex officia?</p>
                </div>
                <div class=" py-3">
                    <h1 class="font-bold text-2xl text-white mb-3">Isi Data Diri</h1>
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum placeat
                        blanditiis nostrum, ipsa nesciunt perferendis deleniti odio corporis ex officia?</p>
                </div>
                <div class=" py-3">
                    <h1 class="font-bold text-2xl text-white mb-3">Download Surat</h1>
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum placeat
                        blanditiis nostrum, ipsa nesciunt perferendis deleniti odio corporis ex officia?</p>
                </div>
            </div>
        </div> --}}


    </div>
@endsection
