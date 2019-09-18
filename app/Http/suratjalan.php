<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suratjalan extends Model
{
    protected $table = 'suratjalans';
    protected $primaryKey = 'KodeSuratJalanID';

    public function sopir()
    {
        return $this->belongsTo('App\karyawan','KodeSopir','IDKaryawan');
    }

    public function uang()
    {
        return $this->belongsTo('App\matauang','KodeMataUang','KodeMataUang');
    }

    public function gudang()
    {
        return $this->belongsTo('App\lokasi','KodeLokasi','KodeLokasi');
    }

    public function pelanggan()
    {
        return $this->belongsTo('App\pelanggan','KodePelanggan','KodePelanggan');
    }
}
