<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKriteriasTable extends Migration
{
    public function up()
    {
        Schema::create('sub_kriterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kriteria_id')->nullable();
            $table->string('name');
            $table->bigInteger('min')->nullable();
            $table->bigInteger('max')->nullable();
            $table->integer('bobot');
            $table->timestamps();

            $table->foreign('kriteria_id')->references('id')->on('kriterias');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sub_kriterias');
    }
}
