<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('HR_Overview', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('year');
            $table->unsignedInteger('total_employees');
            $table->unsignedInteger('new_joines');
            $table->unsignedInteger('on_leave');
            $table->unsignedInteger('open_positions');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('HR_Overview');
    }
};
