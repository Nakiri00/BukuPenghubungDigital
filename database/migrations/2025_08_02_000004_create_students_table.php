<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->string('parent_name');
            $table->string('nisn', 10);
            $table->string('name');
            $table->date('dob');
            $table->string('gender', 10)->default('1');
            $table->string('nationality', 50)->nullable();
            $table->string('religion', 500)->nullable();
            $table->string('address', 500)->nullable();
            $table->unsignedBigInteger('grade_id')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};