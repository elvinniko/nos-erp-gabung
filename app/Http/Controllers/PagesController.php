<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
class PagesController extends Controller
{
    function home(){
        return view('home');
    }


    //method buat route pemeseanan penjualan
    function pemesananPenjualan(){
        return view('pemesananPenjualan.pemesananPenjualan');
    }
    function konfirmasiPenjualan(){
        return view('pemesananPenjualan.konfirmasiPenjualan');
    }
    function dikirimPenjualan(){
        return view('pemesananPenjualan.dikirimPenjualan');
    }
    function batalPenjualan(){
        return view('pemesananPenjualan.batalPenjualan');
    }

    
    function suratJalan(){
        return view('suratJalan.suratJalan');
    }
    function konfirmasiSuratJalan(){
        return view('suratJalan.konfirmasiSuratJalan');
    }
    function returnSuratJalan(){
        return view('suratJalan.returnSuratJalan');
    }
    function konfirmasiReturnSuratJalan(){
        return view('suratJalan.konfirmasiReturnSuratJalan');
    }


    function penjualanLangsung(){
        return view('penjualanLangsung');
    }
    function returnPenjualanLangsung(){
        return view('returnPenjualanLangsung');
    }

    //method buat route pemesenan Pembelian
    function pemesananPembelian(){
        return view('pemesananPembelian.pemesananPembelian');
    }
    function konfirmasiPembelian(){
        return view('pemesananPembelian.konfirmasiPembelian');
    }
    function diterimaPembelian(){
        return view('pemesananPembelian.diterimaPembelian');
    }
    function batalPembelian(){
        return view('pemesananPembelian.batalPembelian');
    }
 

    function penerimaanBarang(){
        return view('penerimaanBarang.penerimaanBarang');
    }
    function konfirmasiPenerimaanBarang(){
        return view('penerimaanBarang.konfirmasiPenerimaanBarang');
    }

    function returnPenerimaanBarang(){
        return view('penerimaanBarang.returnPenerimaanBarang');
    }
    function konfirmasiReturnPenerimaanBarang(){
        return view('penerimaanBarang.konfirmasiReturnPenerimaanBarang');
    }
    
    function datagudang(){
        return view('master.datagudang');
    }
    function dataitem(){
        return view('master.dataitem');
    }
    function dataklasifikasi(){
        return view('master.dataklasifikasi');
    }
    function datamatauang(){
        return view('master.datamatauang');
    }
    function datapelanggan(){
        return view('master.datapelanggan');
    }
    function datasatuan(){
        return view('master.datapelanggan');
    }
    function datasupplier(){
        return view('master.datasupplier');
    }

}
