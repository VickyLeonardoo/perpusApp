<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function viewBuku(){
        // $data = Buku::all();
        // return $data;
        return view('admin.viewBuku',[
            'title' => 'Daftar Buku',
            'buku' => Buku::all(),
        ]);
    }

    public function viewTambahBuku(){
        return view('admin.viewTambahBuku',[
            'title' => 'Tambah Data Buku',
        ]);
    }

    public function simpanBuku(Request $request){
        $str = strtolower(Request()->judul);

        $request->validate([
            'judul' => 'required',
            'tglTerbit' => 'required',
            'pengarang' => 'required',
            'stok' => 'required|numeric'
        ],[
            'judul.required' => 'Judul Harus Diisi',
            'tglTerbit.required' => 'Tanggal Harus Diisi',
            'pengarang.required' => 'Pengarang harus Diisi',
            'stok.required' => 'Stok Harus Diisi',
            'stok.numeric' => 'Stok Harus Angka'
        ]);

        $data = [
            'judul' => Request()->judul,
            'pengarang' => Request()->pengarang,
            'tglTerbit' => Request()->tglTerbit,
            'stok' => Request()->stok,
            'slug' => preg_replace('/\s+/', '-', $str),
        ];
        // return $data;
        Buku::create($data);
        return redirect()->route('viewBuku')->withToastSuccess('Data Buku Berhasil Disimpan..');
        // return $request->all();
    }

    public function viewEdit($slug){
        return view('admin.viewEditBuku',[
            'title' => 'Edit Buku',
            'buku' => Buku::where('slug',$slug)->first(),
        ]);
    }

    public function updateBuku(Request $request, $id){
        $str = strtolower(Request()->judul);
        $slug = preg_replace('/\s+/', '-', $str);
        $request->validate([
            'judul' => 'required',
            'tglTerbit' => 'required',
            'pengarang' => 'required',
            'stok' => 'required|numeric'
        ],[
            'judul.required' => 'Judul Harus Diisi',
            'tglTerbit.required' => 'Tanggal Harus Diisi',
            'pengarang.required' => 'Pengarang harus Diisi',
            'stok.required' => 'Stok Harus Diisi',
            'stok.numeric' => 'Stok Harus Angka'
        ]);

        $data = [
            'judul' => Request()->judul,
            'pengarang' => Request()->pengarang,
            'tglTerbit' => Request()->tglTerbit,
            'stok' => Request()->stok,
            'slug' => preg_replace('/\s+/', '-', $str),
        ];

        Buku::where('id',$id)->update($data);
        return redirect()->route('viewEdit',[$slug])->withToastSuccess('Data Berhasil Diupdate');
    }

    public function hapusBuku($id){
        Buku::where('id',$id)->delete();
        return redirect()->back()->withToastSuccess('Data Buku Berhasil Dihapus');
    }
}
