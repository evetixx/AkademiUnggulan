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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 100)->nullable();
            $table->string('nama', 100)->nullable();
            $table->enum('jenis_kelamin',['Pria', 'Wanita'])->nullable();
            $table->string('irs', 100)->nullable();
            $table->string('khs', 100)->nullable();
            $table->enum('status_pkl',['Belum', 'Sedang', 'Selesai'])->nullable();
            $table->enum('status_skripsi',['Belum', 'Sedang', 'Selesai'])->nullable();
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
        Schema::dropIfExists('mahasiswa');
    }
};
