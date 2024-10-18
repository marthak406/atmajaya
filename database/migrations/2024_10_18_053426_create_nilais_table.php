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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mahasiswa')->constrained('mahasiswas')->onDelete('cascade'); 
            $table->string('semester');
            $table->year('tahun');
            $table->decimal('nilai', 5, 2); 
            $table->foreignId('id_dosen')->constrained('dosens')->onDelete('cascade'); 
            $table->foreignId('id_user_verifikasi')->nullable()->constrained('pegawais')->onDelete('set null');
            $table->boolean('is_verifikasi')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
