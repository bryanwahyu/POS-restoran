<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasukKopisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masuk__kopis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kopi_id')->unsigned();
            $table->foreign('kopi_id')->references('id')->on('kopis')->onDelete('cascade');
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
        Schema::dropIfExists('masuk__kopis');
    }
}
