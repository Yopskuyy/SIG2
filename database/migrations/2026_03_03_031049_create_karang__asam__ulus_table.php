<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKarangAsamUlusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karang__asam__ulus', function (Blueprint $table) {
            $table->id('id');
            $table->string('Nama_lokasi');
            $table->longtext('koordinat_poligon');
            $table->string('warna_poligon');
            $table->text('deskripsi');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('karang__asam__ulus');
    }
}
