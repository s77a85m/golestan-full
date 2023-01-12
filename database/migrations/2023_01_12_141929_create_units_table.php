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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('unit_deg')->unique();
            $table->integer('unit_num')->unique();
            $table->integer('unit_gp')->unique();
            $table->string('slug')->nullable();
            $table->foreignId('orientation_id')->constrained('orientations');
            $table->foreignId('prerequisite_id')->constrained('units');
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
        Schema::dropIfExists('units');
    }
};
