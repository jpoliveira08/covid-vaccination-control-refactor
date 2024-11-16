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
        Schema::create('employees_vaccinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_employee')
                ->constrained('employees')
                ->cascadeOnDelete();
            $table->foreignId('id_vaccine')
                ->constrained('vaccines')
                ->cascadeOnDelete();
            $table->tinyInteger('dose_number');
            $table->date('dose_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees_vaccinations');
    }
};
