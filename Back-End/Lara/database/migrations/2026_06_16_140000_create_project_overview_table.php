<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Project_Overview', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->unsignedInteger('in_progress');
            $table->unsignedInteger('completed');
            $table->unsignedInteger('on_hold');
            $table->unsignedInteger('not_started');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Project_Overview');
    }
};
