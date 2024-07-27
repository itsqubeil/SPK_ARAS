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
        Schema::create('sub_kriterias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kriteria_id')->nullable()->index('sub_kriterias_kriteria_id_foreign');
            $table->string('name');
            $table->bigInteger('min')->nullable();
            $table->bigInteger('max')->nullable();
            $table->integer('bobot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kriterias');
    }
};
