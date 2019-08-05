<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\suratjalan;
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
        $suratjalans = suratjalan::all();
        return view('suratJalan.suratJalan',['suratjalans' => $suratjalans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pemesananpenjualan =pemesananpenjualan::all()->where('Status','CFM');
        if ($id==0){
            $init = $pemesananpenjualan->first();
        }else{
            $init = pemesananpenjualan::all()->where('KodeSO',$id)->first();
        }
        $pelanggans = DB::table('pelanggans')->get();
        $lokasis = DB::table('lokasis')->get();
        if($init!=null){
        }
        return view('suratJalan.buatSuratJalan', compact('pemesananpenjualan', 'id', 'pelanggans', 'lokasis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
