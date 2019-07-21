<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pemesananpembelian;
use App\lokasi;
use App\matauang;
use App\supplier;
use App\item;
use Illuminate\Support\Facades\DB;

class PemesananPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesananpembelian = DB::table('pemesananpembelians')
            ->join('lokasis', 'pemesananpembelians.KodeLokasi', '=', 'lokasis.KodeLokasi')
            ->join('matauangs', 'pemesananpembelians.KodeMataUang', '=', 'matauangs.KodeMataUang')
            ->join('suppliers', 'pemesananpembelians.KodeSupplier', '=', 'suppliers.KodeSupplier')
            ->select('pemesananpembelians.*', 'lokasis.NamaLokasi', 'matauangs.NamaMataUang', 'suppliers.NamaSupplier')
            ->get();
        return view('pemesananPembelian.pemesananPembelian', [
            'pemesananpembelian' => $pemesananpembelian
        ]);

        // return view('pemesananPembelian.pemesananPembelian')
        //     ->with('matauang', matauang::all())
        //     ->with('lokasi', lokasi::all())
        //     ->with('supplier', supplier::all())
        //     ->with('item', item::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matauang = DB::table('matauangs')->get();
        $lokasi = DB::table('lokasis')->get();
        $supplier = DB::table('suppliers')->get();
        $item = DB::table('items')->get();
        $last_id = DB::select('SELECT * FROM pemesananpembelians ORDER BY KodePO DESC LIMIT 1');

        $year_now = date('y');
        $month_now = date('m');
        $date_now = date('d');

        if ($last_id == null) {
            $newID = "PO-" . $year_now . $month_now . "0001";
        } else {
            $string = $last_id[0]->KodePO;
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

            $newID = "PO-" . $year_now . $month_now . $newID;
        }

        return view('pemesananPembelian.buatPembelian', [
            'newID' => $newID,
            'matauang' => $matauang,
            'lokasi' => $lokasi,
            'supplier' => $supplier,
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
            'KodePO' => 'required',
            'KodeLokasi' => 'required',
            'KodeMataUang' => 'required',
            'KodeSupplier' => 'required',
            'PPN' => 'required',
            'Tanggal' => 'required',
            'Expired' => 'required'
        ]);

        DB::table('pemesananpembelians')->insert([
            'KodePO' => $request->KodePO,
            'KodeLokasi' => $request->KodeLokasi,
            'KodeMataUang' => $request->KodeMataUang,
            'KodeSupplier' => $request->KodeSupplier,
            'PPN' => $request->PPN,
            'Tanggal' => $request->Tanggal,
            'Expired' => $request->Expired,
            'Keterangan' => $request->Keterangan,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        return redirect('/popembelian');

        // pemesananpembelian::create([
        //     'KodePO' => (string)$request->kodepo,
        //     'KodeLokasi' => (string)$request->kodelokasi,
        //     'KodeMataUang' => (string)$request->kodematauang,
        //     'PPN' => $request->ppn,
        //     'Tanggal' => $request->tanggal,
        //     'Expired' => $request->expired,
        //     'Keterangan' => $request->keterangan
        // ]);

        // return redirect()->route('pemesananpembelian.pemesananpembelian');
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
        DB::table('pemesananpembelians')->where('KodePO', $id)->delete();
        return redirect('/popembelian');
    }
}
