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
        Schema::table('schools', function (Blueprint $table) {
            $table->boolean('is_school_of_month')->default(false)->after('is_active');
            $table->string('featured_badge_text')->nullable()->after('is_school_of_month');
            $table->date('featured_until')->nullable()->after('featured_badge_text');
        });
    }

    public function down(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->dropColumn(['is_school_of_month', 'featured_badge_text', 'featured_until']);
        });
    }
};
