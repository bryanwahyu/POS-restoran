<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->bigInteger('meja_id')->unsigned();
            $table->foreign('meja_id')->references('id')->on('mejas')->onDelete('cascade');
            $table->string('nama')->default('waitress');
            $table->integer('status')->default('0');
            $table->bigInteger('total')->detault('0');
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
        Schema::dropIfExists('orders');
    }
}
