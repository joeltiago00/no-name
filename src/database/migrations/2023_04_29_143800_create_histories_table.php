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
        Schema::create('historical', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->unsignedBigInteger('model_id');
            $table->longText('old_value')->nullable();
            $table->longText('new_value')->nullable();
            $table->foreignId('user_update_id')->nullable()->constrained('users');
            $table->foreignId('user_delete_id')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historical');
    }
};
