<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->string('KodePelanggan');
            $table->string('NamaPelanggan');
            $table->string('Kontak');
            $table->string('Handphone');
            $table->string('Email');
            $table->string('NIK');
            $table->double('LimitPiutang');
            $table->double('Diskon');
            $table->string('Status');
            $table->string('KodeLokasi');
            $table->string('KodeUser');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggans');
    }
}
