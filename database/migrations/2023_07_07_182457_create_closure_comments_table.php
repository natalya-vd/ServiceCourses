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
        Schema::create('closure_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')
                ->constrained('comments');
            $table->foreignId('child_id')
                ->constrained('comments');
            $table->integer('depth');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers_comments');
    }
};
