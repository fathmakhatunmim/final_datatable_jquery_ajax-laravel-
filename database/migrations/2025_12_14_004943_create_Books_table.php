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
        Schema::create('Books', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('title');
            $table->string('author');
            $table->string('category');
            $table->boolean('available')->default(true); // 1 = available, 0 = not
            $table->timestamps(); // created_at এবং updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Books');
    }
};
