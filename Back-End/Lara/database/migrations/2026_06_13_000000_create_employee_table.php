<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Employee', function (Blueprint $table) {
            $table->id('Id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('birth_place');
            $table->decimal('salary_per_month', 10, 2);
            $table->date('start_date');
            $table->string('department');
            $table->text('skills');
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Employee');
    }
};
