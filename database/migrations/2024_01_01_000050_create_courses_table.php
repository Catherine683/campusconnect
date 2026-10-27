<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lecturer_id')->nullable()->constrained()->onDelete('set null');
            $table->string('course_code')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('credit_units')->default(3);
            $table->string('semester')->default('I'); // I, II
            $table->integer('year_level')->default(1);
            $table->string('department')->nullable();
            $table->integer('max_students')->default(50);
            $table->string('status')->default('active'); // active, inactive
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
