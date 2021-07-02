<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuacas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('id_destinasi')->unique();
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
        Schema::dropIfExists('cuacas');
    }
}
