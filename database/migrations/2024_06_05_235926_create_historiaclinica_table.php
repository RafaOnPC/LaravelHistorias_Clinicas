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
        Schema::create('historiaclinica', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("antecedentes_medicos");
            $table->string("indicaciones_medicas");
            $table->string("diagnostico_medico");
            $table->string("alergias");
            $table->string("afiliacion");
            $table->string("cie");
            $table->foreignId("doctor_id")->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("paciente_id")->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historiaclinica');
    }
};
