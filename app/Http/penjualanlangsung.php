<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penjualanlangsung extends Model
{
    protected $table = 'penjualanlangsungs';
    protected $primaryKey = 'KodePenjualanLangsungID';
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
