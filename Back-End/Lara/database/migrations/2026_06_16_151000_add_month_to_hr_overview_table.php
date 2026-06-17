<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('HR_Overview', function (Blueprint $table) {
            $table->string('month')->after('year')->default('January');
        });
    }

    public function down(): void
    {
        Schema::table('HR_Overview', function (Blueprint $table) {
            $table->dropColumn('month');
        });
    }
};
