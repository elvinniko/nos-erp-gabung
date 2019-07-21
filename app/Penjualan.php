<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualanlangsungs';

    public function lokasi()
    {
        return $this->hasMany('App\lokasi');
    }

    public function matauang()
    {
        return $this->belongsTo('App\matauang');
    }
}
