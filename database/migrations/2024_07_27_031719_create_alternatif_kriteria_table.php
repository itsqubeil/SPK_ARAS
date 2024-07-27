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
        Schema::create('alternatif_kriteria', function (Blueprint $table) {
            $table->unsignedBigInteger('alternatif_id')->index('alternatif_kriteria_alternatif_id_foreign');
            $table->unsignedBigInteger('kriteria_id')->index('alternatif_kriteria_kriteria_id_foreign');
            $table->double('nilai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif_kriteria');
    }
};
