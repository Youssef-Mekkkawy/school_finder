<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Modify the status enum to include 'attention'
        DB::statement("ALTER TABLE appointments MODIFY COLUMN status ENUM('pending','confirmed','cancelled','attention') NOT NULL DEFAULT 'pending'");

        Schema::table('appointments', function (Blueprint $table) {
            $table->text('cancel_reason')->nullable()->after('status');
            $table->text('attention_note')->nullable()->after('cancel_reason');
            $table->date('confirmed_date')->nullable()->after('attention_note');
            $table->text('admin_note')->nullable()->after('confirmed_date');
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn(['cancel_reason', 'attention_note', 'confirmed_date', 'admin_note']);
        });

        DB::statement("ALTER TABLE appointments MODIFY COLUMN status ENUM('pending','confirmed','cancelled') NOT NULL DEFAULT 'pending'");
    }
};
