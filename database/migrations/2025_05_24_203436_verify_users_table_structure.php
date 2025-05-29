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
    

    // database/migrations/2025_05_24_203436_verify_users_table_structure.php
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        // Add role column if it doesn't exist
        if (!Schema::hasColumn('users', 'role')) {
            $table->enum('role', ['admin', 'organizer', 'user'])->default('user');
        }
        
        // Add status column if needed
        if (!Schema::hasColumn('users', 'status')) {
            $table->enum('status', ['active', 'inactive'])->default('active');
        }
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['role', 'status']);
    });
}
};
