<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\stokmasuk;
use App\lokasi;

class StokMasukController extends Controller
{
    public function index(){
        $stokmasuks = stokmasuk::latest()->paginate(5);
        return view('stokmasuk.stokmasuk',['stokmasuks' => $stokmasuks]);
    }

    public function create(){
        $last_id = DB::select('SELECT * FROM stokmasuks ORDER BY KodeStokMasuk DESC LIMIT 1');

        $year_now = date('y');
        $month_now = date('m');
        $date_now = date('d');

        if ($last_id == null) {
            $newID = "SLM-" . $year_now . $month_now . "0001";
        } else {
            $string = $last_id[0]->KodeStokMasuk;
            $id = substr($string, -4, 4);
            $month = substr($string, -6, 2);
            $year = substr($string, -8, 2);

            if ((int) $year_now > (int) $year) {
                $newID = "0001";
            } else if ((int) $month_now > (int) $month) {
                $newID = "0001";
            } else {
                $newID = $id + 1;
                $newID = str_pad($newID, 4, '0', STR_PAD_LEFT);
            }

            $newID = "SLM-" . $year_now . $month_now . $newID;
        }
        $lokasi = lokasi::all();
        return view('stokmasuk.create', ['newID' => $newID, 'lokasi' => $lokasi]);
    }

    public function store(Request $request){
        DB::table('stokmasuks')->insert([
            'KodeStokMasuk' => $request->KodeStokMasuk,
            'KodeLokasi' => $request->KodeLokasi,
            'Tanggal' => $request->Tanggal,
            'Status' => $request->Status,
            'TotalItem' => $request->TotalItem
        ]);

        return redirect('/stokmasuk');
    }
}
