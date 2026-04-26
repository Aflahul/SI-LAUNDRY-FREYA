<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_artikel', function (Blueprint $table) {
            $table->id('id_artikel');
            $table->string('judul');
            $table->string('Isi');
            $table->timestamp('waktu');
            $table->string('status');
            $table->text('foto')->nullable();
            $table->timestamps();
        });
        Schema::create('tb_arus', function (Blueprint $table) {
            $table->id('id_arus');
            $table->string('kode');
            $table->string('nama');
            $table->string('arus');
            $table->date('tgl');
            $table->integer('total');
            $table->integer('saldo');
            $table->timestamps();
        });

        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->timestamps();
        });
        Schema::create('tb_profil', function (Blueprint $table) {
            $table->id('id_laundry');
            $table->string('nama_laundry');
            $table->string('tagline');
            $table->string('desk');
            $table->string('alamat');
            $table->string('kontak');        
            $table->text('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel_arus_transaksi_profil');
    }
};
