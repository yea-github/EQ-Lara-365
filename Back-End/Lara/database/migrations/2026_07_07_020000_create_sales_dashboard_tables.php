<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Sales_Dashboard_Summary', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->unsignedBigInteger('total_sales');
            $table->unsignedInteger('total_orders');
            $table->unsignedInteger('average_order_value');
            $table->decimal('conversion_rate', 5, 2);
            $table->decimal('return_rate', 5, 2);
            $table->decimal('total_sales_change', 6, 2);
            $table->decimal('total_orders_change', 6, 2);
            $table->decimal('average_order_value_change', 6, 2);
            $table->decimal('conversion_rate_change', 6, 2);
            $table->decimal('return_rate_change', 6, 2);
            $table->unique(['year', 'month'], 'sales_dashboard_summary_period_unique');
        });

        Schema::create('Sales_Over_Time', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->string('sales_month');
            $table->decimal('sales_amount', 6, 2);
            $table->unique(['year', 'month', 'sales_month'], 'sales_over_time_period_unique');
        });

        Schema::create('Sales_Top_Products', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->string('product');
            $table->unsignedInteger('sales');
            $table->unsignedBigInteger('revenue');
        });

        Schema::create('Sales_Recent_Orders', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->string('order_no');
            $table->string('customer');
            $table->date('order_date');
            $table->unsignedInteger('amount');
            $table->string('status');
        });

        Schema::create('Sales_Top_Customers', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->string('customer');
            $table->unsignedInteger('orders');
            $table->unsignedBigInteger('total_sales');
            $table->unsignedInteger('outstanding');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Sales_Top_Customers');
        Schema::dropIfExists('Sales_Recent_Orders');
        Schema::dropIfExists('Sales_Top_Products');
        Schema::dropIfExists('Sales_Over_Time');
        Schema::dropIfExists('Sales_Dashboard_Summary');
    }
};
