<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>@yield('title')</title>
</head>

<body>
    <div class="bg-gradient-to-t from-yellow-400 to-white">
        {{-- navbar --}}
        <div class="bg-yellow-500 flex justify-between py-4 px-10 " data-aos="fade-down" data-aos-duration="1000">
            <img src="{{ asset('gambar/zaily.png') }}" alt="" class="w-20">
            <ul class="justify-center flex gap-6 text-[15px] place-items-center">
                <li class="text-white hover:text-yellow-700 font-bold flex gap-1">
                    <img src="{{ asset('gambar/home.png') }}" alt="" class="w-4 h-4">
                    <a href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="text-white hover:text-yellow-700 font-bold flex gap-1">
                    <img src="{{ asset('gambar/road.png') }}" alt="" class="w-4 h-4">
                    <a href="{{ route('jalur') }}">Info Jalur</a>
                </li>
                <li class="text-white hover:text-yellow-700 font-bold flex gap-1">
                    <img src="{{ asset('gambar/writing.png') }}" alt="" class="w-4 h-4">
                    <a href="{{ route('reservasi') }}">Reservasi</a>
                </li>
                <li class="text-white hover:text-yellow-700 font-bold flex gap-1">
                    <img src="{{ asset('gambar/reservation.png') }}" alt="" class="w-4 h-4">
                    <a href="{{ route('cekproses') }}">Cek Proses</a>
                </li>
                <li class="text-white hover:text-yellow-700 font-bold flex gap-1">
                    <img src="{{ asset('gambar/reservation.png') }}" alt="" class="w-4 h-4">
                    <a href="{{ route('konfirmasi') }}">Konfirmasi Pembayaran</a>
                </li>
                {{-- <li class="text-white hover:text-yellow-900 font-bold flex gap-1">
                    <img src="{{ asset('gambar/reservation.png') }}" alt="" class="w-4 h-4">
                    <a href="{{route('logout')}}">Logout</a>
                </li> --}}
            </ul>
        </div>


        @yield('konten')

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
    <script>
        
        $(document).ready(function(){
        $("#tujuan").change(function(){
            var input = $(this).val();
            if(input != ""){
                $.ajax({
                    url: "/reservasi",
                    method: "POST",
                    data: {
                        input: input,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data){
                        $("#kelas").html(data.options);
                    },
                    error: function(xhr, status, error){
                        console.error("AJAX Error: ", status, error);
                    }
                });
            } else {
                $("#kelas").html('<h1 class="text-slate-700 font-bold pb-1 pl-2">Kelas </h1><select name="kelas" class="rounded-lg w-64 h-8 px-2"><option value="">Pilih Kelas</option></select>');
            }
        });
    });

    let selectedSeats = [];

        function selectSeat(button) {
            const kursiId = button.getAttribute('data-id');

            if (selectedSeats.includes(kursiId)) {
                selectedSeats = selectedSeats.filter(id => id !== kursiId);
                button.classList.remove('bg-green-500');
                button.classList.add('bg-gray-300');
            } else {
                selectedSeats.push(kursiId);
                button.classList.remove('bg-gray-300');
                button.classList.add('bg-green-500');
            }
        }

        function submitSeats() {
            document.getElementById('kursi_ids').value = selectedSeats.join(',');
            document.getElementById('kursi-form').submit();
        }

    // pilihkursi
    // function selectSeat(button, id_kursi) {
    //         // Ubah warna kursi menjadi hijau
    //         button.style.backgroundColor = 'green';

    //         // Kirim id_kursi ke server melalui AJAX
    //         fetch('/pilihkursi', {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //             },
    //             body: JSON.stringify({ id_kursi: id_kursi })
    //         })
    //         .then(response => response.json())
    //         .then(data => {
    //             if (data.success) {
    //                 console.log('Kursi berhasil dipilih');
    //             } else {
    //                 console.log('Gagal memilih kursi');
    //             }
    //         })
    //         .catch(error => console.error('Error:', error));
    //     }

    // $(document).ready(function(){
    //     $("#kelas").change(function(){
    //         var idBis = $(this).val(); // Mengambil nilai dari pilihan kelas yang dipilih
    //         console.log(idBis); // Anda bisa menampilkan ID bis di konsol untuk memeriksanya
    //         // Lakukan apa pun yang diperlukan dengan ID bis, seperti mengirimkannya ke server melalui AJAX
    //         $.ajax({
    //             url: "/reservasi",
    //             method: "POST",
    //             data: {
    //                 id_bis : idBis, // Mengirimkan nilai ID bis
    //                 _token: '{{ csrf_token() }}'
    //             },
    //             success: function(data){
    //                 // Lakukan sesuatu setelah berhasil mengirim data, jika diperlukan
    //                 $("#kursiButtons").html(data.kursiButtons);
    //             },
    //             error: function(xhr, status, error){
    //                 console.error("AJAX Error: ", status, error);
    //             }
    //         });
    //     });
    // });
    

        let currentStep = 1;

        function next() {
            document.getElementById(`form${currentStep}`).classList.add('hidden');
            currentStep++;
            document.getElementById(`form${currentStep}`).classList.remove('hidden');
        }

        function back() {
            document.getElementById(`form${currentStep}`).classList.add('hidden');
            currentStep--;
            document.getElementById(`form${currentStep}`).classList.remove('hidden');
        }


        // var selectedSeats = [];

    // function selectSeat(seat, seatId) {
    //     seat.classList.toggle('bg-green-500');
    //     var seatNumber = seat.innerText;
    //     if (selectedSeats.includes(seatId)) {
    //         var index = selectedSeats.indexOf(seatId);
    //         if (index !== -1) {
    //             selectedSeats.splice(index, 1);
    //         }
    //     } else {
    //         selectedSeats.push(seatId);
    //     }
    //     var selectedSeatsElement = document.getElementById('selectedSeats');
    //     selectedSeatsElement.innerHTML = "<p>Nomor Kursi yang Dipilih: " + selectedSeats.join(', ') + "</p>";
    // }

    // function selectSeats() {
    //     fetch('/select-seats', { 
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //         },
    //         body: JSON.stringify({
    //             selectedSeats: selectedSeats
    //         })
    //     })
    // }

    // function submitOrder() {
    //     var nama = $('input[name="nama"]').val();
    //     var alamat = $('input[name="alamat"]').val();
    //     var wa = $('input[name="wa"]').val();
    //     var tanggal = $('input[name="tanggal"]').val();
    //     var id_bis = $('#kelas').val();
    //     var id_jadwal = $('#tujuan').val();

    //     fetch('/submit-order', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //         },
    //         body: JSON.stringify({
    //             nama: nama,
    //             alamat: alamat,
    //             wa: wa,
    //             tanggal: tanggal,
    //             id_bis: id_bis,
    //             id_jadwal: id_jadwal,
    //             selectedSeats: selectedSeats
    //         })
    //     }).then(response => response.json())
    //     .then(data => {
    //         if(data.success) {
    //             // Tampilkan detail pesanan di form3
    //             let orderDetails = `
    //                 <p>Nama: ${data.order.nama}</p>
    //                 <p>Nomor WA: ${data.order.wa}</p>
    //                 <p>Jadwal: ${data.order.jadwal.tujuan} || ${data.order.jadwal.pukul}</p>
    //                 <p>Kelas Bis: ${data.order.bis.kelas}</p>
    //                 <p>Kursi Pesanan: ${data.order.kursi.join(', ')}</p>
    //                 <p>Total Harga: Rp ${data.order.total}</p>
    //                 <p>No Resi: ${data.order.no_resi}</p>
    //             `;
    //             document.getElementById('orderSummary').innerHTML = orderDetails;
    //         }
    //     }).catch(error => console.error('Error:', error));
    // }

    </script>


    {{-- library aos --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
