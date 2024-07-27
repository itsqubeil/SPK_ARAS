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
        Schema::table('alternatif_kriteria', function (Blueprint $table) {
            $table->foreign(['alternatif_id'])->references(['id'])->on('alternatifs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['kriteria_id'])->references(['id'])->on('kriterias')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alternatif_kriteria', function (Blueprint $table) {
            $table->dropForeign('alternatif_kriteria_alternatif_id_foreign');
            $table->dropForeign('alternatif_kriteria_kriteria_id_foreign');
        });
    }
};
