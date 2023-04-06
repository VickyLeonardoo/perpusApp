<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;
class PengembalianController extends Controller
{
    public function viewPengembalian(){
        return view('admin.viewPengembalian',[
            'title' => 'Daftar Pengembalian',
            'pengembalian' => Pengembalian::all(),
        ]);
    }
}
