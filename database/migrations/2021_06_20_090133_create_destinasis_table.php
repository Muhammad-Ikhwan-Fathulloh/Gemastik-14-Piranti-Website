<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinasis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('id_destinasi')->unique();
            $table->string('gambar_destinasi');
            $table->string('nama_destinasi');
            $table->string('alamat_destinasi');
            $table->string('harga_destinasi');
            $table->string('kategori_provinsi')->nullable();
            $table->string('kategori_kota')->nullable();
            $table->string('kategori_kecamatan')->nullable();
            $table->string('kategori_kelurahan')->nullable();
            $table->string('keterangan_destinasi');
            $table->integer('jumlah_pengunjung')->default(0);
            $table->string('latitude_destinasi');
            $table->string('longitude_destinasi');
            $table->string('suhu')->default("0");
            $table->string('kelembapan')->default("0");
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('destinasis');
    }
}
