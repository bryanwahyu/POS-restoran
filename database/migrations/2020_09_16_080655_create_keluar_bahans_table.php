<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluarBahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluar_bahans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bahan_id')->unsigned();
            $table->foreign('bahan_id')->references('id')->on('bahans')->onDelete('cascade');
            $table->string('nama');
            $table->double('jumlah',8,2);
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('keluar_bahans');
    }
}
