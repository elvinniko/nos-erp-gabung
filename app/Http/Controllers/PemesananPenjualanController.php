<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pemesananpenjualan;
use App\pemesananpembelian;
use App\lokasi;
use App\matauang;
use App\pelanggan;
use App\item;
use Illuminate\Support\Facades\DB;

class PemesananPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesananpenjualan =pemesananpenjualan::all()->where('Status','OPN');
        return view('pemesananPenjualan.pemesananPenjualan',['pemesananpenjualan' => $pemesananpenjualan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemesananpembelian = DB::table('pemesananpembelians')->get();
        $matauang = DB::table('matauangs')->get();
        $lokasi = DB::table('lokasis')->get();
        $pelanggan = DB::table('pelanggans')->get();
        $item = DB::select("SELECT s.KodeItem, s.NamaItem, k.HargaJual, t.NamaSatuan, s.Keterangan FROM items s 
            inner join itemkonversis k on k.KodeItem = s.KodeItem 
            inner join satuans t on k.KodeSatuan = t.KodeSatuan where s.jenisitem='bahanbaku' ");
        $last_id = DB::select('SELECT * FROM pemesananpenjualans ORDER BY KodeSO DESC LIMIT 1');

        $year_now = date('y');
        $month_now = date('m');
        $date_now = date('d');

        if ($last_id == null) {
            $newID = "SO-" . $year_now . $month_now . "0001";
        } else {
            $string = $last_id[0]->KodeSO;
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

            $newID = "SO-" . $year_now . $month_now . $newID;
        }

        return view('pemesananPenjualan.buatPenjualan', [
            'newID' => $newID,
            'pemesananpembelian' => $pemesananpembelian,
            'matauang' => $matauang,
            'lokasi' => $lokasi,
            'pelanggan' => $pelanggan,
            'item' => $item
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   


        $this->validate($request, [
            'KodeSO' => 'required',
            'Tanggal' => 'required',
            'TanggalKirim' => 'required',
            'Expired' => 'required',
            'KodeMataUang' => 'required',
            'KodeLokasi' => 'required',
            'KodePelanggan' => 'required',
            'Term' => 'required',
        ]);


        DB::table('pemesananpenjualans')->insert([
            'KodeSO' => $request->KodeSO,
            'Tanggal' => $request->Tanggal,
            'tgl_kirim' => $request->TanggalKirim,
            'Expired' => $request->Expired,
            'KodeLokasi' => $request->KodeLokasi,
            'KodeMataUang' => $request->KodeMataUang,
            'KodePelanggan' => $request->KodePelanggan,
            'Term' => $request->Term,
            'Keterangan' => $request->Keterangan,
            'Status' => 'OPN',
            'KodeUser' => 'Admin',
            'Total' => 0,
            'PPN' => $request->ppn,
            'NilaiPPN'=>$request->ppnval,
            'Printed'=>0,
            'Diskon'=>$request->diskon,
            'NilaiDiskon'=>$request->diskonval,
            'Subtotal'=>$request->subtotal,
            'KodeSales'=>0,
            'POPelanggan'=>$request->po,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $items = $request->item;
        $qtys = $request->qty;
        $prices = $request->price;
        $totals = $request->total;
        foreach ($items as $key => $value) {
            DB::table('pemesanan_penjualan_detail')->insert([
                'KodeSO' => $request->KodeSO,
                'KodeItem'=>$items[$key],
                'Qty' => $qtys[$key],
                'Harga' => $prices[$key],
                'NoUrut' => 0,
                'Subtotal' => $totals[$key],
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
            
        }
        return redirect('/sopenjualan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $data = DB::select("SELECT a.KodeSo, a.Tanggal, a.tgl_kirim,a.Expired,a.term, a.POPelanggan, b.NamaMataUang, c.NamaLokasi, d.NamaPelanggan, a.Keterangan, a.Diskon, a.PPN, a.Subtotal from pemesananpenjualans a 
            inner join matauangs b on b.KodeMataUang = a.KodeMataUang
            inner join lokasis c on c.KodeLokasi = a.KodeLokasi
            inner join pelanggans d on d.KodePelanggan = a.KodePelanggan
            where a.KodeSO ='".$id."' limit 1")[0];
        $items = DB::select("SELECT a.Qty,b.NamaItem,d.NamaSatuan, a.Harga, a.Subtotal, b.Keterangan  from pemesanan_penjualan_detail a 
            inner join items b on a.KodeItem = b.KodeItem
            inner join itemkonversis c on c.KodeItem = a.KodeItem 
            inner join satuans d on c.KodeSatuan = d.KodeSatuan
            where a.KodeSO ='".$id."' ");
        // dd($items);
        return view('pemesananpenjualan.show', compact('data', 'id', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pemesananpenjualans')->where('KodeSO', $id)->delete();
        return redirect('/sopenjualan');
    }

    public function confirm(Request $request, $id)
    {
        $data = pemesananpenjualan::find($id);
        $data->Status = "CFM";
        $data->save();
        return redirect('/konfirmasipemesananPenjualan');
    }

    public function konfirmasiPenjualan(){
        $pemesananpenjualan =pemesananpenjualan::all()->where('Status','CFM');
        return view('pemesananPenjualan.listkonfirmasi',['pemesananpenjualan' => $pemesananpenjualan]);
    }

    public function dikirimPenjualan(){
        $pemesananpenjualan =pemesananpenjualan::all()->where('Status','CLS');
        return view('pemesananPenjualan.listkonfirmasi',['pemesananpenjualan' => $pemesananpenjualan]);
    }
}
