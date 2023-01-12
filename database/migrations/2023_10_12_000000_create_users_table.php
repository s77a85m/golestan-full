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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('national_name')->unique();
            $table->string('mobile')->unique();
            $table->integer('stuNum')->unique();
            $table->string('avatar');
            $table->string('slug')->nullable();
            $table->foreignId('grade_id')->constrained('grades');
            $table->foreignId('major_id')->constrained('majors');
            $table->foreignId('role_id')->constrained('roles');
            $table->foreignId('orientation_id')->constrained('orientations');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
