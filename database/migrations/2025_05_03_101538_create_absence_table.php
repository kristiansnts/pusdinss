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
        Schema::create('absence', function (Blueprint $table) {
            $table->uuid('absenceId')->primary();
            $table->string('userId');
            $table->string('scheduleId');
            $table->string('reason');
            $table->string('scheduleReplacementId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absence');
    }
};
