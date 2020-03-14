<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerhitunganSuarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perhitungan_suara', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tps_id');
            $table->foreign('tps_id')->references('id')->on('tps');
            $table->unsignedBigInteger('kandidat_id'); 
            $table->foreign('kandidat_id')->references('id')->on('kandidat');
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
        Schema::dropIfExists('perhitungan_suara');
    }
}
