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
        $pemesananpenjualan =
        // DB::table('pemesananpenjualans')
        //     ->join('lokasis', 'pemesananpenjualans.KodeLokasi', '=', 'lokasis.KodeLokasi')
        //     ->join('matauangs', 'pemesananpenjualans.KodeMataUang', '=', 'matauangs.KodeMataUang')
        //     ->join('pelanggans', 'pemesananpenjualans.KodePelanggan', '=', 'pelanggans.KodePelanggan')
        //     ->join('pemesananpembelians', 'pemesananpembelians.KodePO', '=', 'pemesananpembelians.KodePO')
        //     ->select('pemesananpenjualans.*', 'lokasis.NamaLokasi', 'matauangs.NamaMataUang', 'pelanggans.NamaPelanggan', 'pemesananpembelians.KodePO')
        //     ->get();
        //ORM
        //  pemesananpenjualan::join('lokasis','pemesananpenjualans.KodeLokasi', '=', 'lokasis.KodeLokasi')
        //      ->join('matauangs', 'pemesananpenjualans.KodeMataUang', '=', 'matauangs.KodeMataUang')
        //      ->join('pelanggans', 'pemesananpenjualans.KodePelanggan', '=', 'pelanggans.KodePelanggan')
        //      ->join('pemesananpembelians', 'pemesananpembelians.KodePO', '=', 'pemesananpembelians.KodePO')
        //      ->where('Status','=','OPN')
        //      ->get();

          pemesananpenjualan::all()->where('Status','OPN');
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
        $item = DB::table('items')->get();
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
            'KodePO' => 'required',
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
            'KodePO' => $request->KodePO,
            'Tanggal' => $request->Tanggal,
            'TanggalKirim' => $request->TanggalKirim,
            'Expired' => $request->Expired,
            'KodeLokasi' => $request->KodeLokasi,
            'KodeMataUang' => $request->KodeMataUang,
            'KodePelanggan' => $request->KodePelanggan,
            'Term' => $request->Term,
            'Keterangan' => $request->Keterangan,
            'Status' => 'OPN',
            'KodeUser' => 'Admin',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
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
        $pemesananpenjualan =  pemesananpenjualan::find($id);
        $pemesananpenjualan =  pemesananpenjualan::join('lokasis','pemesananpenjualans.KodeLokasi', '=', 'lokasis.KodeLokasi')
             ->join('matauangs', 'pemesananpenjualans.KodeMataUang', '=', 'matauangs.KodeMataUang')
             ->join('pelanggans', 'pemesananpenjualans.KodePelanggan', '=', 'pelanggans.KodePelanggan')
             ->join('pemesananpembelians', 'pemesananpembelians.KodePO', '=', 'pemesananpembelians.KodePO')
            //  ->where('Status','=','OPN')
             ->get();
        return view('pemesananpenjualan.show', compact('pemesananpenjualan'));
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
}
