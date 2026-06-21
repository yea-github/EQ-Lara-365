<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('User', 'privilege') && ! Schema::hasColumn('User', 'roles')) {
            DB::statement("ALTER TABLE `User` CHANGE `privilege` `roles` VARCHAR(255) NOT NULL DEFAULT 'User'");
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('User', 'roles') && ! Schema::hasColumn('User', 'privilege')) {
            DB::statement("ALTER TABLE `User` CHANGE `roles` `privilege` VARCHAR(255) NOT NULL DEFAULT 'user'");
        }
    }
};
