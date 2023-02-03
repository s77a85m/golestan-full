<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_of_select_units', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('count');
            $table->integer('unit_num');
            $table->string('slug')->nullable();
            $table->foreignId('professor_id')->constrained('professors');
            $table->foreignId('selectUnit_id')->constrained('select_units');
            $table->json('date_class')->nullable();
            $table->json('date_quiz')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_of_select_units');
    }
};
