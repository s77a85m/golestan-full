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
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('status', ['busy', 'termination']);
            $table->integer('received');
            $table->integer('average')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->integer('rejected')->nullable();
            $table->integer('deleted')->nullable();
            $table->enum('conditional', ['ok', 'no'])->default('no');
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
        Schema::dropIfExists('semesters');
    }
};
