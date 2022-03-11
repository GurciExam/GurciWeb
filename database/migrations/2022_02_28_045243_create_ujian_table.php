<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id');
            $table->foreignId('kelas_id');
            $table->string('namaUjian',50);
            $table->enum('jenisUjian',['ujianBiasa','ujianUTS','ujianUAS']);
            $table->text('deskripsiUjian');
            $table->integer('banyakSoal');
            $table->binary('soalUjian');
            $table->binary('kunciJawaban');
            $table->binary('penjelasanKunciJawaban');
            $table->string('kodeUjian',10);
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
        Schema::dropIfExists('ujian');
    }
}
