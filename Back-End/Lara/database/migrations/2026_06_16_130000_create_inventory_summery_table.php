<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Inventory_Summery', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->string('item_categorie');
            $table->unsignedInteger('items');
            $table->unsignedInteger('qty_in_hand');
            $table->unsignedBigInteger('value');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Inventory_Summery');
    }
};
