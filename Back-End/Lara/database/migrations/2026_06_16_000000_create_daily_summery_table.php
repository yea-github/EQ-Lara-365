<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Daily_Summery', function (Blueprint $table) {
            $table->id('Id');
            $table->string('icon');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->unsignedBigInteger('total_revenue');
            $table->unsignedInteger('total_sales_orders');
            $table->unsignedInteger('total_purchase_orders');
            $table->unsignedBigInteger('total_inventory_value');
            $table->unsignedBigInteger('total_outstanding');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Daily_Summery');
    }
};
