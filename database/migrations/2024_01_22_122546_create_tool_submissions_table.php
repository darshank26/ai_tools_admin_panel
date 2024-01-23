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
        Schema::create('tool_submissions', function (Blueprint $table) {
            $table->id();

            $table->integer('product_name');
            $table->integer('product_logo');
            $table->integer('product_image');
            $table->string('url');
            $table->string('pricing')->nullable();
            $table->string('short_description')->nullable();
            $table->string('long_description')->nullable();
            $table->string('tags')->nullable();
            $table->string('your_name')->nullable();
            $table->string('your_email')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_submissions');
    }
};
