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
        Schema::create('haura_ceritas', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->text('isi_cerita');
        $table->text('nilai_moral')->nullable();
        $table->foreignId('id_kategori')->constrained('haura_kategoris')->onDelete('cascade');
        $table->foreignId('id_daerah')->constrained('haura_daerahs')->onDelete('cascade');
        $table->string('gambar')->nullable(); 
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('haura_ceritas', function (Blueprint $table) {
            //
        });
    }
};
