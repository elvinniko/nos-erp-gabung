<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratjalandetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratjalandetails', function (Blueprint $table) {
            $table->string('KodeSuratJalan');
            $table->string('KodeItem');
            $table->string('KodeSatuan');
            $table->double('Qty');
            $table->string('Keterangan');
            $table->integer('NoUrut');
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
        Schema::dropIfExists('suratjalandetails');
    }
}
