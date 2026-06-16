<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Customers', function (Blueprint $table) {
            $table->id('Id');
            $table->string('customer_name');
            $table->decimal('sales', 12, 2);
            $table->unsignedInteger('orders');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Customers');
    }
};
