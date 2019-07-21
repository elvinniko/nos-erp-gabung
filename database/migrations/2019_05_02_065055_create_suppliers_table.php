<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->string('KodeSupplier');
            $table->string('NamaSupplier');
            $table->string('Kontak');
            $table->string('Handphone');
            $table->string('Email');
            $table->string('NIK');
            $table->string('Status');
            $table->string('KodeLokasi');
            $table->string('KodeUser');
            $table->string('Alamat');
            $table->string('Kota');
            $table->string('Provinsi');
            $table->string('Negara');
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
        Schema::dropIfExists('suppliers');
    }
}
