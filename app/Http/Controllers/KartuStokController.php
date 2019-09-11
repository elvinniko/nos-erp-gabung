<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\keluarmasukbarang;
use App\lokasi;
use App\satuan;
use PDF;

class KartuStokController extends Controller
{
    public function index(){
        $stok = keluarmasukbarang::get();
        $store = lokasi::where('Status','OPN')->get();
        $item = DB::select("SELECT s.KodeItem, s.NamaItem, k.HargaJual, t.NamaSatuan, s.Keterangan FROM items s 
            inner join itemkonversis k on k.KodeItem = s.KodeItem 
            inner join satuans t on k.KodeSatuan = t.KodeSatuan where s.jenisitem='bahanbaku' ");
        $satuan = satuan::get();
        $filter = false;
        return view('kartustok.index',compact('stok', 'store','item','satuan','filter'));
    }

    public function filter(Request $request){
        $stok = DB::select("SELECT a.* FROM keluarmasukbarangs a left join itemkonversis b on a.KodeItem = b.KodeItem
			where a.Tanggal >='".$request->start."' and a.Tanggal <='".$request->finish."'
			and a.KodeLokasi='".$request->lokasi."' and a.KodeItem='".$request->item."'and b.KodeSatuan='".$request->satuan."' ");
        $store = lokasi::where('Status','OPN')->get();
        $item = DB::select("SELECT s.KodeItem, s.NamaItem, k.HargaJual, t.NamaSatuan, s.Keterangan FROM items s 
            inner join itemkonversis k on k.KodeItem = s.KodeItem 
            inner join satuans t on k.KodeSatuan = t.KodeSatuan where s.jenisitem='bahanbaku' ");
        $satuan = satuan::get();
        $filter = true;
        $start = $request->start;
        $finish = $request->finish;
        $lokasifil = $request->lokasi;
        $itemfil = $request->item;
        $satuanfil = $request->satuan;
        return view('kartustok.index',compact('stok', 'store','item','satuan','filter','start','finish','itemfil','satuanfil','lokasifil'));
    }

    public function print(Request $request){
    	if($request->start!=null){
    		$stok = DB::select("SELECT a.* FROM keluarmasukbarangs a left join itemkonversis b on a.KodeItem = b.KodeItem
			where a.Tanggal >='".$request->start."' and a.Tanggal <='".$request->finish."'
			and a.KodeLokasi='".$request->lokasi."' and a.KodeItem='".$request->item."'and b.KodeSatuan='".$request->satuan."' ");
    	}else{
    		$stok = keluarmasukbarang::get();
    	}
    	$pdf = PDF::loadview('kartustok.pdf',['stok'=>$stok]);
    	return $pdf->download('kartustok.pdf');
        
    }
}
