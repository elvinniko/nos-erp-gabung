<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\invoicepiutang;
use App\lokasi;

class InvoiceController extends Controller
{
    public function piutang(){
        $invoice = DB::select('SELECT i.KodeInvoicePiutangShow, i.KodeInvoicePiutang, p.NamaPelanggan, i.Tanggal, d.Subtotal, 0 as bayar, 0 as selisih FROM invoicepiutangs i inner join invoicepiutangdetails d on i.KodeInvoicePiutang = d.KodeInvoicePiutang inner join pelanggans p on p.KodePelanggan = i.KodePelanggan');
        return view('invoice.piutang.index',compact('invoice'));
    }
}
