<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKopisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kopis', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('jenis');
            $table->string('asal');
            $table->double('stok', 15, 8)->default(0);
            $table->double('reminder',15,8)->default(0.5);
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
        Schema::dropIfExists('kopis');
    }
}
