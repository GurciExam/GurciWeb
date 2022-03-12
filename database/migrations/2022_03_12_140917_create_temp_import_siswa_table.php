<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempImportSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_import_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('namaSiswa',25);
            $table->string('nis',25)->unique();
            $table->enum('jenisKelamin',['L','P']);
            $table->timestamp('tanggalLahir', 0);
            $table->string('alamat',25);
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
        Schema::dropIfExists('temp_import_siswa');
    }
}
