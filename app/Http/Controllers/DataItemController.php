<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\item;
use App\kategori;
use App\satuan;
use App\itemkonversi;

class DataItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = item::latest()->paginate(5);
        $items = item::leftJoin('itemkonversis','itemkonversis.KodeItem','=','items.KodeItem')
        ->select('items.*','itemkonversis.KodeSatuan')
        ->paginate(5);
        // $items = item::all();
        return view('master.dataItem', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_id = DB::select('SELECT * FROM items ORDER BY KodeItem DESC LIMIT 1');

        //Auto generate ID
        if($last_id == null) {
            $newID = "BRS000001";
        }
        else {
            $string = $last_id[0]->KodeItem;
            $id = substr($string, -3, 3);
            $new = $id+1;
            $new = str_pad($new, 5, '0', STR_PAD_LEFT);
            $newID = "BRS0".$new;
        }
        $satuan = satuan::all();
        $itemk = itemkonversi::all();
        $kategori = kategori::all();
        return view('master.buatForm.buatDataItem', ['kategori' => $kategori, 'newID' => $newID, 'satuan' => $satuan, 'itemk' => $itemk]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'KodeItem' => 'required',
        //     'KodeKategori' => 'required',
        //     'NamaItem' => 'required',
        //     'Status' => 'required'
        // ]);
        // item::create($request->all());
        DB::table('items')->insert([
            'KodeItem' => $request->KodeItem,
            'KodeKategori' => $request->KodeKategori,
            'NamaItem' => $request->NamaItem,
            'jenisitem' => $request->jenisitem,
            'Alias' => $request->Alias,
            'Keterangan' => $request->Keterangan,
            'Status' => 'OPN',
            'KodeUser' => 'Admin',
            // 'KodeSatuan' => $request->KodeSatuan,
            // 'Konversi' => $request->Konversi,
            // 'HargaJual' => $request->HargaJual,
            // 'HargaBeli' => $request->HargaBeli,
            // 'HargaGrosir' => $request->HargaGrosir
        ]);

        // DB::table('itemkonversis')->insert([
        //     'KodeItem' => $request->KodeItem,
        //     'KodeSatuan' => $request->KodeSatuan,
        //     'Konversi' => $request->Konversi,
        //     'HargaJual' => $request->HargaJual,
        //     'HargaBeli' => $request->HargaBeli,
        //     'HargaGrosir' => $request->HargaGrosir
        // ]);

        return redirect('/dataitem');
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
        return view('editForm.buatDataItem');
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
