<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->dropPrimary('nomor_induk',10);
            $table->string('name',50);
            $table->string('tempat_lahir',20);
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->enum('status_pernikahan',['single','menikah']);
            $table->integer('jumlah_anak');
            $table->string('alamat',100);
            $table->string('nomor_telepon');
            $table->text('pendidikan_terakhir');
            $table->string('kode_jabatan');
            //nanti ada table jabatan
            $table->string('kode_cabang');
            $table->integer('gaji_pokok');
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
        Schema::dropIfExists('karyawan');
    }
}
