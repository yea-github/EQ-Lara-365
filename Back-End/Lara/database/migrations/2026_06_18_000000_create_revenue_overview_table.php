<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Revenue_Overview', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('Year');
            $table->string('Month');
            $table->decimal('Revenue', 4, 2);
            $table->decimal('Expenses', 4, 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Revenue_Overview');
    }
};
