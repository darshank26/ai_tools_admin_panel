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
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('logo')->nullable();
            $table->string('description')->nullable();
            $table->string('pros')->nullable();
            $table->string('cons')->nullable();
            $table->string('is_free')->nullable();
            $table->string('is_paid')->nullable();
            $table->string('is_freemium')->nullable();
            $table->string('is_free_trial')->nullable();
            $table->string('url')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools');
    }
};
