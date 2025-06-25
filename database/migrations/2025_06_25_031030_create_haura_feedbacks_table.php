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
        Schema::create('haura_feedbacks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
        $table->foreignId('id_cerita')->constrained('haura_ceritas')->onDelete('cascade');
        $table->unsignedTinyInteger('rating')->nullable(); // 1–5
        $table->text('komentar')->nullable();
        $table->timestamps();

        // Optional: batasi 1 feedback per cerita per user
        $table->unique(['id_user', 'id_cerita']);
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('haura_feedbacks');
    }
};
