<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index()
    {
        $pesan = DB::table('pesanan')->count();
        $jadwal = DB::table('bis')->count();
        $konfirmasi = DB::table('konfirmasi')->count();
        $tolak = DB::table('tolak')->count();
        return view('admin.dashboard', compact('pesan', 'jadwal', 'konfirmasi', 'tolak'));
    }

    public function datapesanan()
    {
        $data = DB::table('pesanan')->where('keterangan', 'sudah bayar')->get();

        return view('admin.ad_pesanan', compact('data'));
    }
    public function hapus_pesanan($id)
    {
        DB::table('pesanan')->where('id_pesanan', $id)->delete();
        return redirect()->back()->with('succes', 'Pesanan Berhasil Dihapus');
    }
    public function cetakLaporan(Request $request)
    {
        $month = $request->input('month');
        $ps = DB::table('pesanan')
            ->join('jadwal', 'pesanan.id_jadwal', '=', 'jadwal.id_jadwal')
            ->join('bis', 'pesanan.id_bus', '=', 'bis.id_bis')
            ->select(
                'pesanan.nama',
                'pesanan.alamat',
                'pesanan.wa',
                'pesanan.tanggal',
                'pesanan.resi',
                'pesanan.total',
                'bis.kelas',
                'jadwal.tujuan'
            )
            ->where('pesanan.keterangan', 'sudah bayar')
            ->whereMonth('pesanan.tanggal', '=', date('m', strtotime($month)))
            ->whereYear('pesanan.tanggal', '=', date('Y', strtotime($month)))
            ->get();

        $pdf = PDF::loadView('admin.claporan', ['ps' => $ps]);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('laporan-' . $month . '.pdf');
    }

    public function konfirmasiadmin()
    {
        $con = DB::table('konfirmasi')
            ->join('pesanan', 'konfirmasi.resi', '=', 'pesanan.resi')
            ->select('konfirmasi.*', 'pesanan.nama', 'pesanan.total', 'pesanan.id_pesanan')
            ->get();
        return view('admin.ad_konfirmsi', compact('con'));
    }

    public function ditolak()
    {
        $con = DB::table('tolak')
            ->join('pesanan', 'tolak.resi', '=', 'pesanan.resi')
            ->select('tolak.*', 'pesanan.nama', 'pesanan.id_pesanan')
            ->get();
        return view('admin.ad_tolak', compact('con'));
    }

    public function hapus_tolak($id)
    {
        DB::table('tolak')->where('id_tolak', $id)->delete();
        return redirect()->back()->with('success', 'berhasil dihapus');
    }

    public function riject($resi, $id)
    {

        DB::table('tolak')->insert([
            'resi' => $resi,
        ]);

        DB::table('konfirmasi')->where('id_konfirmasi', $id)->delete();

        return redirect()->back()->with('success', 'Pesanan berhasil ditolak');
    }

    public function accept($id, $idk)
    {
        DB::table('pesanan')
            ->where('id_pesanan', $id)
            ->update(['keterangan' => 'sudah bayar']);

        DB::table('konfirmasi')
            ->where('id_konfirmasi', $idk)
            ->delete();

        return redirect()->back()->with('success', 'Pesanan berhasil dikonfirmasi');
    }

    public function kosong($id)
    {
        $latestPesanan = DB::table('bis')->get();

        // Memeriksa apakah pesanan terbaru ditemukan
        if ($latestPesanan) {
            // Mengambil id_bis dari pesanan terbaru
            $idBis = $latestPesanan->id_bus;
            $tanggal = $latestPesanan->tanggal;

            // Mengambil data kursi berdasarkan id_bis dari pesanan terbaru
            $kursi = DB::table('kursi')->where('id_bis', $idBis)->where('tanggal', $tanggal)->get();
            if ($kursi->isNotEmpty()) {
                return view('admin.ad_kursi', ['kr' => $kursi]);
            } else {
                return redirect()->back()->with('alert', 'Tidak ada Bis yang berangkat pada tanggal tersebut');
            }
            // dd($idBis,$kursi);
            // Mengirim data kursi ke view

        } else {
            return "Tidak ada pesanan yang ditemukan.";
        }

        // DB::table('kursi')->where('id_kursi', $id)->update(['status' => 'tidak terisi']);
        // return redirect()->back()->with('success', 'kursi dikosongkan');
    }

    public function kkursi()
    {
        $kr = DB::table('kursi')->get();
        return view('admin.ad_kursi', compact('kr',));
    }
    public function datajadwal()
    {
        $jadwal = DB::table('jadwal')
            ->join('bis', 'jadwal.id_jadwal', '=', 'bis.id_jadwal')
            ->join('kursi', 'bis.id_bis', '=', 'kursi.id_bis')
            ->select('jadwal.id_jadwal', 'bis.harga', 'bis.id_bis', 'jadwal.tujuan', 'bis.kelas', 'kursi.tanggal', 'jadwal.pukul')
            ->groupBy('jadwal.id_jadwal', 'bis.harga', 'bis.kelas', 'bis.id_bis', 'kursi.tanggal', 'jadwal.tujuan', 'jadwal.pukul')
            ->orderBy('kursi.tanggal', 'DESC')
            ->get();

        // Fetch all distinct kelas from bis table
        $kelas = DB::table('bis')
            ->select('kelas')
            ->distinct()
            ->get();

        return view('admin.ad_jadwal', ['jd' => $jadwal, 'kelas' => $kelas]);
    }



    // Controller
    public function editJadwal($id)
    {
        // Retrieve data from jadwal, bis, and kursi tables based on id_bis
        $data = DB::table('bis')
            ->join('jadwal', 'bis.id_jadwal', '=', 'jadwal.id_jadwal')
            ->join('kursi', 'bis.id_bis', '=', 'kursi.id_bis')
            ->select('jadwal.*', 'bis.kelas', 'bis.id_bis', 'bis.harga', 'kursi.tanggal')
            ->where('bis.id_bis', $id)
            ->first();

        // If data is not found, you can handle it accordingly (e.g., show an error message)
        if (!$data) {
            abort(404, 'Data not found');
        }

        return view('admin.edit_jadwal', compact('data'));
    }


    public function updateJadwal(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'tujuan' => 'required|string|max:255',
            'pukul' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        // Ambil id_bis dari parameter yang diterima
        $id_bis = $id;

        // Update jadwal table
        DB::table('jadwal')
            ->join('bis', 'jadwal.id_jadwal', '=', 'bis.id_jadwal')
            ->where('bis.id_bis', $id_bis)
            ->update([
                'tujuan' => $request->tujuan,
                'pukul' => $request->pukul,
            ]);

        // Update bis table
        DB::table('bis')
            ->where('id_bis', $id_bis)
            ->update([
                'kelas' => $request->kelas,
                'harga' => $request->harga,
            ]);

        // Update kursi table
        DB::table('kursi')
            ->where('id_bis', $id_bis)
            ->update([
                'tanggal' => $request->tanggal,
            ]);

        return redirect()->route('datajadwal')->with('success', 'Data jadwal berhasil diperbarui.');
    }
}
