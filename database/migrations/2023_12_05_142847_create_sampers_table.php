<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sampers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna')->constrained('penggunas');
            $table->foreignId('id_produk')->constrained('produks');
            $table->string('jumlah');
            $table->string('total_harga');
            $table->string('alamat_samper');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampers');
    }
};
