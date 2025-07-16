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
        Schema::create('servis', function (Blueprint $table) {
            $table->id();
            $table->string('no_nota');
            $table->date('tgl_servis');
            $table->foreignId('id_pelanggan')->constrained('pelanggans')->onDelete('cascade');
            $table->string('unit');
            $table->string('no_seri');
            $table->string('keluhan');
            $table->string('kelengkapan');
            $table->string('pin_passcode')->nullable();
            $table->integer('estimasi_biaya')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servis');
    }
};
