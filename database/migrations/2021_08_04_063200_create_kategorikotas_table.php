<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorikotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategorikotas', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_provinsi')->nullable();
            $table->string('kategori_kota')->nullable();
            $table->string('kategori_kecamatan')->nullable();
            $table->string('kategori_kelurahan')->nullable();
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
        Schema::dropIfExists('kategorikotas');
    }
}
