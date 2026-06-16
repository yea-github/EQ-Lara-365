<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Sales', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->string('category_name');
            $table->unsignedTinyInteger('sales_by_percentage');
            $table->unsignedBigInteger('total_sales_price');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Sales');
    }
};
