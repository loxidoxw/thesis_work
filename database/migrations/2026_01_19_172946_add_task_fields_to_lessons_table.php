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
        Schema::table('lessons', function (Blueprint $table) {
            $table->string('task_description')->nullable()->after('order');
            $table->date('start_date')->nullable()->after('task_description');
            $table->date('deadline')->nullable()->after('start_date');
            $table->string('file_path')->nullable()->after('deadline');
            $table->string('file_url')->nullable()->after('file_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn('task_description');
            $table->dropColumn('start_date');
            $table->dropColumn('deadline');
            $table->dropColumn('file_path');
            $table->dropColumn('file_url');
        });
    }
};
