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
        $item = DB::select("SELECT s.KodeItem, s.NamaItem, k.HargaJual, t.NamaSatuan, s.Keterangan FROM items s 
            inner join itemkonversis k on k.KodeItem = s.KodeItem 
            inner join satuans t on k.KodeSatuan = t.KodeSatuan where s.jenisitem='bahanbaku' ");
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
        return view('stokmasuk.create', compact('newID','lokasi','item'));
    }

    public function store(Request $request){
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
        $tot = 0;
        $qtys = $request->qty;
        foreach ($qtys as $key => $value) {
            $tot += $value;
        }

        DB::table('stokmasuks')->insert([
            'KodeStokMasuk' => $newID,
            'KodeLokasi' => $request->KodeLokasi,
            'Tanggal' => $request->Tanggal,
            'Status' => 'CFM',
            'Printed' => 0,
            'TotalItem' => $tot,
            'KodeUser' => 'Admin',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        $items = $request->item;
        
        foreach ($items as $key => $value) {
            DB::table('stokmasukdetails')->insert([
                'KodeStokMasuk' => $newID,
                'KodeItem' => $value,
                'Qty' => $qtys[$key],
                'KodeSatuan' => '',
                'Keterangan' => '',
                'NoUrut' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }


        foreach ($items as $key => $value) {
            DB::table('keluarmasukbarangs')->insert([
                'Tanggal' => $request->Tanggal,
                'KodeLokasi' => $request->KodeLokasi,
                'KodeItem' => $value,
                'JenisTransaksi'=>'SLM',
                'KodeTransaksi'=>$newID,
                'Qty' => $qtys[$key],
                'HargaRata'=>0,
                'KodeUser'=>'Admin',
                'idx'=>0,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
        
        return redirect('/stokmasuk');
    }
}
