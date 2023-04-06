<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Transaksi;
class TransaksiController extends Controller
{
    public function viewPeminjaman(){
        return view('admin.viewPeminjaman',[
            'title' => 'Halaman Peminjaman'
        ]);
    }
    public function viewTambahPeminjaman(){
        $noPeminjaman = Transaksi::first();
        if (!$noPeminjaman) {
            $noPeminjaman = 0;
        }else{
            $noPeminjaman->id ;
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
        $stokUpdate = $getBuku->stok - Request()->jumlahBuku;

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

        $data = [
            'anggota_id' => request()->anggota_id,
            'buku_id' => request()->buku_id,
            'jumlahBuku' => request()->jumlahBuku,
            'tglPeminjaman' => request()->tglPeminjaman
        ];

        $dataStok = [
            'stok' => $stokUpdate
        ];

        Transaksi::create($data);
        Buku::where('id',Request()->buku_id)->update($dataStok);

        return redirect()->route('viewPeminjaman')->withToastSuccess('Data Berhasil Ditambahkan');
    }

    public function viewPengembalian(){
        return view('admin.viewPengembalian',[
            'title' => 'Daftar Pengembalian',
        ]);
    }

}
