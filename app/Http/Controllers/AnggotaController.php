<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{


    public function viewAnggota()
    {
        return view('admin.viewAnggota', [
            'title' => 'Daftar Anggota',
            'anggota' => Anggota::all(),
        ]);
    }

    public function viewTambahAnggota()
    {
        return view('admin.viewTambahAnggota', [
            'title' => 'Tambah Anggota',
        ]);
    }


    public function simpanAnggota(Request $request)
    {
        $lastRow = Anggota::latest('id')->first();
        if (!$lastRow) {
            $lastRow = 0;
        }else{
            $lastRows = $lastRow->id ;
        }

        $noAnggota = 'A'.$lastRows + 1;

        // $noAnggotaPlus = 'A'.$lastRow + 1;

        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'tglLahir' => 'required',
            'agama' => 'required',
        ], [
            'nim.required' => 'Nim Harus Diisi',
            'nama.required' => 'Nama Harus Diisi',
            'tglLahir.required' => 'Tanggal Lahir Harus Diisi',
            'agama.required' => 'Agama Harus Diisi'
        ]);

        $data = [
            'nim' => Request()->nim,
            'nama' => Request()->nama,
            'tglLahir' => Request()->tglLahir,
            'agama' => Request()->agama,
            'noAnggota' => $noAnggota,
        ];

        Anggota::create($data);
        return redirect()->back()->withToastSuccess('Data berhasil Ditambahkan');
    }

    public function viewEdit($no)
    {
        return view('admin.viewEditAnggota', [
            'title' => 'Edit Anggota',
            'anggota' => Anggota::where('noAnggota', $no)->first(),
        ]);
    }

    public function updateAnggota(Request $request, $no)
    {
        $cekNim = Anggota::where('noAnggota', $no)->first();

        if ($cekNim->nim == Request()->nim) {
            $request->validate([
                'nama' => 'required',
                'tglLahir' => 'required',
                'agama' => 'required',

            ], [
                'nama.required' => 'Nama Wajib Diisi',
                'tglLahir' => 'Tanggal Lahir Wajib Diisi',
                'agama' => 'Agama Wajib Diisi',
            ]);
        }else{
            $request->validate([
                'nama' => 'required',
                'nim' => 'required|unique:anggotas|numeric',
                'tglLahir' => 'required',
                'agama' => 'required',

            ], [
                'nama.required' => 'Nama Wajib Diisi',
                'nim.required' => 'Nim Wajib Diisi',
                'nim.numeric' => 'Nim Hanya Boleh Angka',
                'nim.unique' => 'Nim Sudah Terdaftar',
                'tglLahir' => 'Tanggal Lahir Wajib Diisi',
                'agama' => 'Agama Wajib Diisi',
            ]);
        }

        $data = [
            'nim' => Request()->nim,
            'nama' => Request()->nama,
            'tglLahir' => Request()->tglLahir,
            'agama' => Request()->agama,
        ];

        Anggota::where('noAnggota', $no)->update($data);
        return redirect()->back()->withToastSuccess('Data Anggota Berhasil Disimpan');
    }
}
