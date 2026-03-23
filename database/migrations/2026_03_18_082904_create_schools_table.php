<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('type_id')->constrained('school_types');
            $table->foreignId('location_id')->constrained('locations');
            $table->string('email');
            $table->string('phone');
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->tinyInteger('age_min');
            $table->tinyInteger('age_max');
            $table->tinyInteger('class_size_avg')->nullable();
            $table->string('num_students')->nullable();
            $table->decimal('foreign_ratio')->nullable();
            $table->string('transport')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
