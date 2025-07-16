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
        Schema::create('detail_servis', function (Blueprint $table) {
            $table->bigIncrements('id_detail_servis');
            $table->integer('kode_Tracking');
            $table->foreignId('id_jasa')->constrained('jasas')->onDelete('cascade');
            $table->foreignId('id_barang')->constrained('barangs')->onDelete('cascade');
            $table->foreignId('id_servis')->constrained('servis')->onDelete('cascade');
            $table->foreignId('id_pelanggan')->constrained('pelanggans')->onDelete('cascade');
            $table->decimal('harga');
            $table->integer('jumlah');
            $table->enum('status',['Menunggu Separepart', 'Sedang Diproses', 'Sudah Selesai']);
            $table->date('tgl_servis_mulai')->nullable();
            $table->date('tgl_servis_selesai')->nullable();
            $table->text('bukti')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_servis');
    }
};
