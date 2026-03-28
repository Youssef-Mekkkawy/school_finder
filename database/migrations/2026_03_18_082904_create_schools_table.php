<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->foreignId('type_id')->constrained('school_types');
            $table->foreignId('location_id')->constrained('locations');

            // Contact
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();

            // School info
            $table->integer('age_min')->nullable();
            $table->integer('age_max')->nullable();
            $table->integer('class_size_avg')->nullable();
            $table->integer('num_students')->nullable();
            $table->decimal('foreign_ratio')->nullable();
            $table->string('transport')->nullable();

            // Status
            $table->boolean('is_active')->default(true);
            $table->boolean('is_school_of_month')->default(false);
            $table->string('featured_badge_text')->nullable();
            $table->date('featured_until')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
