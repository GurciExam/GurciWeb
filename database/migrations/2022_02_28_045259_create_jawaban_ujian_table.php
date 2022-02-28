<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_ujian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id');
            $table->binary('jawabanBenar');
            $table->binary('jawabanSalah');
            $table->binary('videoScanJawaban');
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
        Schema::dropIfExists('jawaban_ujian');
    }
}
