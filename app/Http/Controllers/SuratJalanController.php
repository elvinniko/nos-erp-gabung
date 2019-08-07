<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\suratjalan;
use App\karyawan;
use App\pemesananpenjualan;

class SuratJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratjalans = suratjalan::where('Status','OPN')->get();
        return view('suratJalan.suratJalan',compact('suratjalans'));
    }

    public function konfirmasiSuratJalan()
    {
        $suratjalans = suratjalan::where('Status','CFM')->get();
        return view('suratJalan.konfirmasiSuratJalan',compact('suratjalans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $drivers = karyawan::where('jabatan','driver')->get();
        $pemesananpenjualan =pemesananpenjualan::all()->where('Status','CFM');
        if ($id=="0"){
            $init = $pemesananpenjualan->first();
            $id = $init->KodeSO;
        }
        $pelanggans = DB::table('pelanggans')->get();
        $lokasis = DB::table('lokasis')->get();
        $items = DB::select("sELECT a.KodeItem,i.NamaItem, SUM(a.qty) as jml, i.Keterangan, s.NamaSatuan, k.HargaJual FROM pemesanan_penjualan_detail a inner join items i on a.KodeItem = i.KodeItem inner join itemkonversis k on i.KodeItem = k.KodeItem inner join satuans s on s.KodeSatuan = k.KodeSatuan where a.KodeSO='".$id."' group by a.KodeItem, i.Keterangan, s.NamaSatuan, k.HargaJual, i.NamaItem ");
        $so =pemesananpenjualan::where('KodeSO',$id)->first();
        $matauang = DB::table('matauangs')->get();
        return view('suratJalan.buatSuratJalan', compact('pemesananpenjualan', 'id', 'pelanggans', 'lokasis','drivers','items','so','matauang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $last_id = DB::select('SELECT * FROM suratjalans ORDER BY KodeSuratJalanID DESC LIMIT 1');

        $year_now = date('y');
        $month_now = date('m');
        $date_now = date('d');

        if ($last_id == null) {
            $newID = "SJ-" . $year_now . $month_now . "0001";
        } else {
            $string = $last_id[0]->KodeSuratJalan;
            $ids = substr($string, -4, 4);
            $month = substr($string, -6, 2);
            $year = substr($string, -8, 2);

            if ((int) $year_now > (int) $year) {
                $newID = "0001";
            } else if ((int) $month_now > (int) $month) {
                $newID = "0001";
            } else {
                $newID = $ids + 1;
                $newID = str_pad($newID, 4, '0', STR_PAD_LEFT);
            }

            $newID = "SJ-" . $year_now . $month_now . $newID;
        }
        DB::table('suratjalans')->insert([
            'KodeSuratJalan' => $newID,
            'Tanggal' => $request->Tanggal,
            'KodeLokasi' => $request->KodeLokasi,
            'KodeMataUang' => $request->KodeMataUang,
            'Status' => 'OPN',
            'KodeUser' => 'Admin',
            'Total' => 0,
            'PPN' => $request->ppn,
            'NilaiPPN'=>$request->ppnval,
            'KodePelanggan' => $request->KodePelanggan,
            'Printed'=>0,
            'Diskon'=>$request->diskon,
            'NilaiDiskon'=>$request->diskonval,
            'Subtotal'=>$request->subtotal,
            'NoIndeks'=>0,
            'Nopol'=>$request->nopol,
            'KodeSO'=>$id,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        return redirect('/suratJalan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
