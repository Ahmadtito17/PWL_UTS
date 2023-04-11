<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lagu', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 50)->nullable();
            $table->string('artis', 50)->nullable();
            $table->string('genre', 30)->nullable();
            $table->date('tanggal_rilis')->nullable();
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
        Schema::dropIfExists('lagu');
    }
};
