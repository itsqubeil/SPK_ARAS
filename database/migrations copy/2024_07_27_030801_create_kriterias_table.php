<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriasTable extends Migration
{
    public function up()
    {
        Schema::create('kriterias', function (Blueprint $table) {
            $table->id(); // Primary key, auto-increment
            $table->string('kode');
            $table->string('name');
            $table->double('bobot', 8, 2);
            $table->tinyInteger('type')->default(1);
            $table->double('min', 8, 2)->nullable();
            $table->double('max', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kriterias');
    }
}
