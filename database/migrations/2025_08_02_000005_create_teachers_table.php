<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nip', 18)->unique();
            $table->string('name', 50);
            $table->date('dob');
            $table->string('gender', 15);
            $table->enum('teacher_type', ['wali_kelas', 'mapel']);
            $table->unsignedBigInteger('grade_id')->nullable();
            $table->string('subject', 50)->nullable();
            $table->string('address', 255);
            $table->string('phone', 15);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};