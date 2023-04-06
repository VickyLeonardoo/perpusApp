<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Anggota;

class AdminController extends Controller
{
    public function index(){
        return view('admin.home',[
            'title' => 'Dashboard Admin'
        ]);
    }


}
