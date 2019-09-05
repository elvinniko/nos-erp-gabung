<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\invoicepiutang;
use App\lokasi;

class InvoiceController extends Controller
{
    public function piutang(){
        $invoice = invoicepiutang::get();
        return view('invoice.piutang.index',compact('invoice'));
    }
}
