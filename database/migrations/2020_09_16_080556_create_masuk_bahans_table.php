<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasukBahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masuk_bahans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bahan_id')->unsigned();
            $table->foreign('bahan_id')->references('id')->on('bahans')->onDelete('cascade');
            $table->string('nama');
            $table->double('jumlah', 15, 8);
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('masuk_bahans');
    }
}
