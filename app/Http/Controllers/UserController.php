<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }
    
    public function upload(Request $request){
        
        $resi=$request->resi;
        $image = $request->file('bukti');
        $imageName = $image->getClientOriginalName(); 
        $image->move(public_path('gambar'), $imageName);
        $cek = DB::table('pesanan')->where('resi', $resi)->first();
        // cek apakah nomor resi yg di input ada di tabel pesanan
        if($cek){
            if($cek->keterangan == 'belum bayar'){
                DB::table('konfirmasi')->insert([
                    'resi'=>$resi,
                    'bukti'=>$imageName
                ]);

                return redirect()->back()->with('alert', 'Konfirmasi Pembayaran terkirim mohon tunggu admin untuk meninjau pembayaran anda');
            }else{
                return redirect()->back()->with('alert', 'Nomor Resi sudah melakukan Pembayaran');
            }
            
        }else{
            return redirect()->back()->with('alert', 'Nomor Resi Tidak Ditemukan');
        }
        
    }

    public function pesan(Request $request){
        DB::table('pesanan')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'wa' => $request->wa,
            'tanggal' => $request->tanggal,
            'id_jadwal' => $request->id_jadwal,
            'id_bus' => $request->id_bus,
            'resi' => '0',
            'total' => 0,
            'keterangan' => 'belum bayar',
        ]);

        return redirect('/pilihkursi');
    }

    public function pilihkursi(){
        // Mengambil pesanan terbaru
    $latestPesanan = DB::table('pesanan')->latest('id_pesanan')->first();

    // Memeriksa apakah pesanan terbaru ditemukan
    if($latestPesanan){
        // Mengambil id_bis dari pesanan terbaru
        $idBis = $latestPesanan->id_bus;
        $tanggal = $latestPesanan->tanggal;

        // Mengambil data kursi berdasarkan id_bis dari pesanan terbaru
        $kursi = DB::table('kursi')->where('id_bis', $idBis)->where('tanggal',$tanggal)->get();
        if($kursi->isNotEmpty()){
            return view('kursi', ['kursi' => $kursi]);
        }else{
            return redirect()->back()->with('alert','Tidak ada Bis yang berangkat pada tanggal tersebut');
        }
        // dd($idBis,$kursi);
        // Mengirim data kursi ke view
        
    } else {
        return "Tidak ada pesanan yang ditemukan.";
    }
    }

    public function simpanKursi(Request $request)
    {
        // $id_kursi = $request->input('id_kursi');
        $selectedSeats = explode(',', $request->input('kursi_ids'));

        // Dapatkan pesanan terbaru
        $latestPesanan = DB::table('pesanan')->latest('id_pesanan')->first();

        if ($latestPesanan) {
            foreach ($selectedSeats as $idKursi) {
                // Update status kursi menjadi terisi
                DB::table('kursi')->where('id_kursi', $idKursi)->update(['status' => 'terisi']);

                // Simpan kursi ke tabel kursi_pesanan
                DB::table('kursi_pesanan')->insert([
                    'id_pesanan' => $latestPesanan->id_pesanan,
                    'id_kursi' => $idKursi,
                ]);

                $bus = DB::table('bis')->where('id_bis', $latestPesanan->id_bus)->first();
                $kelas = substr($bus->kelas, 0, 3);
                $wa = substr($latestPesanan->wa, -2);
                $tanggal = substr($latestPesanan->tanggal, 8, 2);
                $menit = date('i');
                $noResi = $kelas . $wa . $tanggal . $menit;
                $kursi_pesanan = DB::table('kursi_pesanan')->where('id_pesanan', $latestPesanan->id_pesanan)->count();
                $harga=$bus->harga;
                $total=$harga*$kursi_pesanan;
                // dd($noResi);
                DB::table('pesanan')->where('id_pesanan', $latestPesanan->id_pesanan)->update([
        
                'resi' => $noResi,
                'total'=>$total,
               ]);

            }
        }

        return redirect()->route('detail');

    }

    public function detail()
    {
        $pesanan = DB::table('pesanan')->latest('id_pesanan')->first();
        $jadwal=DB::table('jadwal')->where('id_jadwal',$pesanan->id_jadwal)->first();
        $bus = DB::table('bis')->where('id_bis', $pesanan->id_bus)->first();
        $kursi = DB::table('kursi_pesanan')
                    ->join('kursi', 'kursi_pesanan.id_kursi', '=', 'kursi.id_kursi')
                    ->where('kursi_pesanan.id_pesanan', $pesanan->id_pesanan)
                    ->select('kursi.nomor_kursi')
                    ->get();
        

    return view('detail',compact('bus','pesanan','kursi','jadwal'));
    
    }

    public function cetaktiket($data){
        $tiket=DB::table('pesanan')->where('id_pesanan',$data)->first();
        $jadwal=DB::table('jadwal')->where('id_jadwal',$tiket->id_jadwal)->first();
        $bus = DB::table('bis')->where('id_bis', $tiket->id_bus)->first();
        $kursi = DB::table('kursi_pesanan')
                    ->join('kursi', 'kursi_pesanan.id_kursi', '=', 'kursi.id_kursi')
                    ->where('kursi_pesanan.id_pesanan', $tiket->id_pesanan)
                    ->select('kursi.nomor_kursi')
                    ->get();

        // dd($data);
        $pdf=PDF::loadView('cetaktiket',['tiket'=>$tiket,'jadwal'=>$jadwal,'bus'=>$bus,'kursi'=>$kursi]);
        $pdf->setPaper('A4','portrait');
        return $pdf->download('tiket.pdf');

    }

    public function jalur(){
        $data=DB::table('jadwal')->get();
        $bis=DB::table('bis')->get();
        return view('jalur',compact('data','bis'));
    }

    public function reservasi(Request $request){
        if ($request->ajax()) {
        $input = $request->input('input');
        $id_bis = $request->input('id_bis',null);
        // Ambil data bis sesuai dengan input
        $bis = DB::table('bis')->where('id_jadwal', $input)->get();
        // Membuat pilihan kelas
        $options = '<h1 class="text-slate-700 font-bold pb-1 pl-2">Kelas </h1><select name="kelas" class="rounded-lg w-64 h-8 px-2">';
        foreach ($bis as $b) {
            $selected = ($b->id_bis == $id_bis) ? 'selected' : '';
            $options .= '<option value="' . $b->id_bis . '" ' . $selected . '>' . $b->kelas . ' || ' . $b->harga . '</option>';
        }
        $options .= '</select>';
        // buatkan code untuk mengambil value harga di tabel bis lewat id_bis yg diambil lalu jumlahkan dengan jumlah kursi yg dipih yang akan masuk ke field total di tabel pesanan

        // Ambil kursi berdasarkan ID bis
        $kursi = DB::table('kursi')->where('id_bis', $id_bis)->get();

        // Membuat tombol kursi
        $kursiButtons = '';
        // foreach ($kursi as $k) {
        //     if ($k->status == 'terisi') {
        //         $kursiButtons .= '<button class="h-12 w-12 bg-red-500 rounded-lg text-center grid place-content-center" disabled>
        //                             ' . $k->nomor_kursi . '
        //                           </button>';
        //     } else {
        //         $kursiButtons .= '<button type="button" class="h-12 w-12 bg-gray-300 rounded-lg text-center grid place-content-center" onclick="selectSeat(this, \'' . $k->nomor_kursi . '\')">' . $k->nomor_kursi . '</button>';
        //     }
        //     // $kursiButtons .= '<button class="h-12 w-12 bg-gray-300 rounded-lg text-center grid place-content-center" onclick="selectSeat(this, ' . $k->id_kursi . ')">' . $k->nomor_kursi . '</button>';
            
        // }

        // Kirim data sebagai respons JSON
        return response()->json(['options' => $options, 'kursiButtons' => $kursiButtons]);
    } else {
        // Jika bukan request AJAX, tampilkan view reservasi
        $jadwal = DB::table('jadwal')->get();
        return view('booking', compact('jadwal'));
    }
    }

    public function cekproses(){
        
        return view('cekproses');
    }

    public function cekji(Request $request){
        $ketik=$request->input('search');
        $data=DB::table('pesanan')->where('resi','LIKE','%'.$ketik.'%')->get();
        // dd($data);
        if ($data->isEmpty()) {
            return redirect()->back()->with('alert', 'Nomor Resi tidak ditemukan');
        } else {
            if($data->first()->keterangan == 'belum bayar'){
                $message = 'Nomor Resi ' . $ketik . ' ' . $data->first()->keterangan . '. Konfirmasi <a class="text-blue-600 font-bold" href="' . route('konfirmasi') . '">disini</a>';
                return redirect()->back()->with('alert', $message);
            }else{
                $message = 'Nomor Resi ' . $ketik . ' ' . $data->first()->keterangan . '. <a class="text-blue-600 font-bold" href="' . route('cetaktiket', ['id' => $data->first()->id_pesanan]) . '">Cetak Tiket</a>';
                return redirect()->back()->with('alert', $message);
            }
            
        }
    }

    

    public function konfirmasi(){
        return view('konfirmasi');
    }

    // public function cekk(Request $request ){
    //     $input=$request->input('input');
    //     $bis = DB::table('bis')
    //         ->where('id_jadwal', 'like', $input . '%')
    //         ->get();

    //     return view('reservasi',compact('bis'));
    // }

    public function selectSeats(Request $request)
    {
        $selectedSeats = $request->input('selectedSeats');
    $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'wa' => 'required',
        'tanggal' => 'required',
        'id_bis' => 'required',
        'id_jadwal' => 'required',
    ]);

    $kelas = DB::table('bis')->where('id_bis', $request->id_bis)->first()->kelas;
    $no_resi = substr($kelas, 0, 2) . substr($request->wa, -2) . substr($request->tanggal, -2) . substr(now()->format('s'), -2);

    $harga = DB::table('bis')->where('id_bis', $request->id_bis)->first()->harga;
    $total = $harga * count($selectedSeats);

    $id_pesanan = DB::table('pesanan')->insertGetId([
        'id_jadwal' => $request->id_jadwal,
        'id_bis' => $request->id_bis,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'wa' => $request->wa,
        'tanggal_resi' => $request->tanggal,
        'total' => $total,
        'keterangan' => '',
        'no_resi' => $no_resi,
    ]);
    
    foreach ($selectedSeats as $seatNumber) {
        $kursi = DB::table('kursi')->where('nomor_kursi', $seatNumber)->first();
        if ($kursi) {
            DB::table('kursi')->where('nomor_kursi', $seatNumber)->update(['status' => 'terisi']);
            DB::table('kursi_pesanan')->insert([
                'id_pesanan' => $id_pesanan,
                'id_kursi' => $kursi->id_kursi,
            ]);
        }
    }
    dd($harga, $no_resi, $kelas, $total, $id_pesanan, $selectedSeats);

    $jadwal = DB::table('jadwal')->where('id_jadwal', $request->id_jadwal)->first();
    $bis = DB::table('bis')->where('id_bis', $request->id_bis)->first();
    $kursi = DB::table('kursi_pesanan')
        ->join('kursi', 'kursi_pesanan.id_kursi', '=', 'kursi.id_kursi')
        ->where('id_pesanan', $id_pesanan)
        ->pluck('nomor_kursi');

    return response()->json([
        'success' => true,
        'order' => [
            'nama' => $request->nama,
            'wa' => $request->wa,
            'jadwal' => $jadwal,
            'bis' => $bis,
            'kursi' => $kursi,
            'total' => $total,
            'no_resi' => $no_resi,
        ]
    ]);
    }
}
