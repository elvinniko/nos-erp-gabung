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
        $stok = DB::select("select a.Tanggal, a.KodeItem, a.KodeLokasi, a.JenisTransaksi, a.KodeTransaksi, a.Qty, a.HargaRata, a.KodeUser, a.idx, a.indexmov, SUM(b.Qty) as saldo from keluarmasukbarangs a left JOIN keluarmasukbarangs b on a.KodeItem = b.KodeItem and b.created_at <= a.created_at group by a.Tanggal, a.KodeItem, a.KodeLokasi, a.JenisTransaksi,a.KodeTransaksi,a.Qty, a.HargaRata, a.KodeUser, a.idx, a.indexmov order by a.created_at desc ");
        $store = lokasi::where('Status','OPN')->get();
        $item = DB::select("SELECT s.KodeItem, s.NamaItem, k.HargaJual, t.NamaSatuan, s.Keterangan FROM items s 
            inner join itemkonversis k on k.KodeItem = s.KodeItem 
            inner join satuans t on k.KodeSatuan = t.KodeSatuan where s.jenisitem='bahanbaku' ");
        $satuan = satuan::get();
        $filter = false;
        return view('kartustok.index',compact('stok', 'store','item','satuan','filter'));
    }

    public function filter(Request $request){
        $stok = DB::select("select a.Tanggal, a.KodeItem, a.KodeLokasi, a.JenisTransaksi, a.KodeTransaksi, a.Qty, a.HargaRata, a.KodeUser, a.idx, a.indexmov, SUM(b.Qty) as saldo from keluarmasukbarangs a left JOIN keluarmasukbarangs b on a.KodeItem = b.KodeItem and b.created_at <= a.created_at
left join itemkonversis c on a.KodeItem = c.KodeItem
            where a.Tanggal >='".$request->start."' and a.Tanggal <='".$request->finish."'
            and a.KodeLokasi='".$request->lokasi."' and a.KodeItem='".$request->item."'and c.KodeSatuan='".$request->satuan."' 
group by a.Tanggal, a.KodeItem, a.KodeLokasi, a.JenisTransaksi, a.KodeTransaksi, a.Qty, a.HargaRata, a.KodeUser, a.idx, a.indexmov
order by a.created_at desc");
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
    		$stok = DB::select("select a.Tanggal, a.KodeItem, a.KodeLokasi, a.JenisTransaksi, a.KodeTransaksi, a.Qty, a.HargaRata, a.KodeUser, a.idx, a.indexmov, SUM(b.Qty) as saldo from keluarmasukbarangs a left JOIN keluarmasukbarangs b on a.KodeItem = b.KodeItem and b.created_at <= a.created_at
left join itemkonversis c on a.KodeItem = c.KodeItem
            where a.Tanggal >='".$request->start."' and a.Tanggal <='".$request->finish."'
            and a.KodeLokasi='".$request->lokasi."' and a.KodeItem='".$request->item."'and c.KodeSatuan='".$request->satuan."' 
group by a.Tanggal, a.KodeItem, a.KodeLokasi, a.JenisTransaksi, a.KodeTransaksi, a.Qty, a.HargaRata, a.KodeUser, a.idx, a.indexmov
order by a.created_at desc");
    	}else{
    		$stok = DB::select("select a.Tanggal, a.KodeItem, a.KodeLokasi, a.JenisTransaksi, a.KodeTransaksi, a.Qty, a.HargaRata, a.KodeUser, a.idx, a.indexmov, SUM(b.Qty) as saldo from keluarmasukbarangs a left JOIN keluarmasukbarangs b on a.KodeItem = b.KodeItem and b.created_at <= a.created_at group by a.Tanggal, a.KodeItem, a.KodeLokasi, a.JenisTransaksi,a.KodeTransaksi,a.Qty, a.HargaRata, a.KodeUser, a.idx, a.indexmov order by a.created_at desc ");
    	}
        $in =0;
        $out =0;
        foreach ($stok as $s) {
            if($s->Qty>0){
                $in+=$s->Qty;
            }else{
                $out+=$s->Qty*-1;
            }
            
        }
    	$pdf = PDF::loadview('kartustok.pdf',['stok'=>$stok,'in'=>$in,'out'=>$out]);
    	return $pdf->download('kartustok.pdf');
        
    }
}
