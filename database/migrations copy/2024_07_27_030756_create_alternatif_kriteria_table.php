<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifKriteriaTable extends Migration
{
    public function up()
    {
        Schema::create('alternatif_kriteria', function (Blueprint $table) {
            $table->unsignedBigInteger('alternatif_id');
            $table->unsignedBigInteger('kriteria_id');
            $table->double('nilai', 8, 2);
            
            // Ensure foreign keys reference the correct table and column
            $table->foreign('alternatif_id')->references('id')->on('alternatifs')->onDelete('cascade');
            $table->foreign('kriteria_id')->references('id')->on('kriterias')->onDelete('cascade');
            
            // Add primary key if necessary
            $table->primary(['alternatif_id', 'kriteria_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('alternatif_kriteria');
    }
}

