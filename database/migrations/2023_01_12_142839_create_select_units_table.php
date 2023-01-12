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
        Schema::create('select_units', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamp('date_start');
            $table->timestamp('date_end');
            $table->boolean('publish');
            $table->string('slug')->nullable();
            $table->foreignId('major_id')->constrained('majors');
            $table->foreignId('orientation_id')->constrained('orientations');
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
        Schema::dropIfExists('select_units');
    }
};
