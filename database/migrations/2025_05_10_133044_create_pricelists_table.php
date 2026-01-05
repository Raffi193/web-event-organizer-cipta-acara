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
        Schema::create('pricelists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->integer('price');
            $table->foreignId('photographer_id')->constrained('photographers')->cascadeOnDelete();
            $table->foreignId('master_of_ceremony_id')->constrained('master_of_ceremonies')->cascadeOnDelete();
            $table->foreignId('decoration_id')->constrained('decorations')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricelists');
    }
};
