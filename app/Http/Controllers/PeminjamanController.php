<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Transaksi;
use Carbon\Carbon;
use DateTime;
class PeminjamanController extends Controller
{
    public function viewPeminjaman(){
        return view('admin.viewPeminjaman',[
            'title' => 'Halaman Peminjaman',
            'peminjaman' => Peminjaman::where('status',1)->get(),
        ]);
    }
    public function viewTambahPeminjaman(){
        $noPeminjaman = Peminjaman::latest('id')->first();
        if (!$noPeminjaman) {
            $noPeminjaman = 0;
        }else{
           $noPeminjaman = $noPeminjaman->id ;
        }

        // $noPeminjaman =
        return view('admin.viewTambahPeminjaman',[
            'title' => 'Daftar Peminjaman',
            'anggota' => Anggota::all(),
            'buku' => Buku::all(),
            'noPeminjaman' => 'PJM'.$noPeminjaman + 1
        ]);
    }

    public function simpanPeminjaman(Request $request){
        $getBuku = Buku::where('id',Request()->buku_id)->first();

        $request->validate([
            'anggota_id' => 'required',
            'buku_id' => 'required',
            'jumlahBuku' => 'required|numeric',
            'tglPeminjaman' => 'required',
        ],[
            'anggota_id.required' => 'Peminjam Harus Diisi',
            'buku_id.required' => 'Judul Buku Harus Diisi',
            'jumlahBuku.required' => 'Jumlah Buku Harus Diisi',
            'jumlahBuku.numeric' => 'Jumlah Buku Hanya Angka',
            'tglPeminjaman.required' => 'Tanggal Pinjam harus Diisi',
        ]);

        $tglPinjam = Carbon::parse(Request()->tglPeminjaman);
        $tglBatas = $tglPinjam->addDays(14);


        $data = [
            'noPeminjaman' => request()->noPeminjaman,
            'anggota_id' => request()->anggota_id,
            'buku_id' => request()->buku_id,
            'jumlahBuku' => request()->jumlahBuku,
            'tglPeminjaman' => request()->tglPeminjaman,
            'batasPeminjaman' => $tglBatas,
            'status' => 1,
        ];
        Peminjaman::create($data);
        return redirect()->route('viewPeminjaman')->withToastSuccess('Data Berhasil Ditambahkan');
    }



    public function periksaPeminjaman(Request $request, $id){

        $transaksi = Peminjaman::where('id',$id)->first();

        $tanggal_jatuh_tempo = new DateTime($transaksi->batasPeminjaman);
        $tanggal_pengembalian = new DateTime(Request()->tglPengembalian);

        $selisih_hari = $tanggal_jatuh_tempo->diff($tanggal_pengembalian)->format('%r%a');

        if ($selisih_hari < 0) {
            $jumlah_denda = 0;
        }else{
            $jumlah_denda = $selisih_hari * 500;
        }


        return view('admin.periksaDenda',[
            'title' => 'Pengembalian Buku',
            'peminjam' => Peminjaman::where('id',$id)->first(),
            'denda' => $jumlah_denda,
        ]);
    }

    public function pengembalianPeminjaman(Request $request, $id){
        $data = [
            'status' => 2
        ];

        $dataPengembalian = [
            'peminjaman_id' => Request()->id,
            'tglKembali' => Carbon::now(),
            'denda' => Request()->denda,
        ];
        Peminjaman::where('id', $id)->update($data);
        Pengembalian::create($dataPengembalian);
        return redirect()->route('viewPeminjaman')->withToastSuccess('Buku Berhasil Dikembalikan');
    }

}
