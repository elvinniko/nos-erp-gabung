<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\keluarmasukbarang;
use App\lokasi;

class KartuStokController extends Controller
{
    public function index(){
        $stok = keluarmasukbarang::get();
        return view('kartustok.index',compact('stok'));
    }
}
