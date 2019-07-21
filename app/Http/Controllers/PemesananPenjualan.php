<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\lokasi;
use App\matauang;

class PemesananPenjualan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesananpenjualan = Penjualan::latest()->paginate(5);
        return view('pemesananPenjualan.pemesananPenjualan', compact('pemesananpenjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $string = 'PO-19060005';
        // $id = substr($string, -4, 4);
        // $month = substr($string, -6, 2);
        // $year = substr($string, -8, 2);

        // $year_now = date('y');
        // $month_now = date('m');
        // $date_now = date('d');

        // if( (int)$date_now == 1 ) {
        //     $newID = "0001";
        // }
        // else {
        //     $newID = $id+1;
        //     $newID = str_pad($newID, 4, '0', STR_PAD_LEFT);
        // }

        // echo "PO-".$year_now.$month_now.$newID;
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
