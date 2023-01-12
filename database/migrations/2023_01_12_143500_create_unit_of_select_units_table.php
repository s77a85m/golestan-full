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
            $table->integer('unit_deg');
            $table->integer('unit_num');
            $table->string('slug')->nullable();
            $table->foreignId('professor_id')->constrained('professors');
            $table->timestamp('date_class');
            $table->timestamp('date_quiz');
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
