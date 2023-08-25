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
        Schema::create('resep_obat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->string('no_resep')->unique();
            $table->string('no_rm')->unique();
            $table->string('alamat');
            $table->date('tgl');
            $table->string('nama_obat')->index();
            $table->string('kode_obat');
            $table->integer('jumlah_obat');
            $table->double('harga_obat');
            $table->double('ppn_obat');
            $table->double('diskon_obat');
            $table->string('aturan_pakai');
            $table->double('total')->nullable();
            $table->double('subtotal')->nullable();
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
        Schema::dropIfExists('resep_obat');
    }
};
