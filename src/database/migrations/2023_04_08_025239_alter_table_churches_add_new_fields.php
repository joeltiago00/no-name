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
        Schema::table('churches', function (Blueprint $table) {
            $table->unsignedBigInteger('church_type_id')->after('id');
            $table->foreign('church_type_id')
                ->references('id')
                ->on('church_types');
            $table->unsignedBigInteger('user_create_id')->nullable();
            $table->foreign('user_create_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('churches', function (Blueprint $table) {
            $table->dropForeign(['church_type_id']);
            $table->dropForeign(['user_create_id']);
            $table->dropColumn('church_type_id', 'user_create_id');
        });
    }
};
