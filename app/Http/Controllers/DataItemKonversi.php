<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\satuan;

class DataItemKonversi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $satuan = satuan::all();
        $last_id = DB::select('SELECT * FROM items ORDER BY KodeItem DESC LIMIT 1');

        //Auto generate ID
        if($last_id == null) {
            $newID = "BRS000001";
        }
        else {
            $string = $last_id[0]->KodeItem;
            $id = substr($string, -3, 3);
            $new = $id++;
            $new = str_pad($new, 5, '0', STR_PAD_LEFT);
            $newID = "BRS0".$new;
        }
        return view('master.buatForm.buatDataItemKonversi',['satuan' => $satuan,'newID'=> $newID]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('itemkonversis')->insert([
            'KodeItem' => $request->KodeItem,
            'KodeSatuan' => $request->KodeSatuan,
            'Konversi' => $request->Konversi,
            'HargaJual' => $request->HargaJual,
            'HargaBeli' => $request->HargaBeli,
            'HargaGrosir' => $request->HargaGrosir
        ]);

        return redirect('/dataitem/create');
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
