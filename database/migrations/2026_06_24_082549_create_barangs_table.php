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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')
                  ->constrained('kategoris')
                  ->cascadeOnDelete();         // hapus barang jika kategori dihapus
            $table->string('nama');
            $table->string('kode')->unique();  // kode unik barang
            $table->text('deskripsi')->nullable();
            $table->integer('stok')->default(0);
            $table->decimal('harga', 15, 2)->default(0); // harga dengan 2 desimal
            $table->string('satuan')->default('pcs');    // pcs, kg, liter, dll
            $table->string('foto')->nullable();          // path foto barang
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
