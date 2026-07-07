<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('CRM_Summary_Cards', function (Blueprint $table) {
            $table->id('Id');
            $table->string('metric_key');
            $table->string('title');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->decimal('value', 10, 2);
            $table->decimal('change_percent', 6, 2);

            $table->unique(['metric_key', 'year', 'month'], 'crm_summary_cards_metric_period_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CRM_Summary_Cards');
    }
};
