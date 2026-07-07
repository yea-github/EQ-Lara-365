<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('CRM_Leads_Over_Time', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->string('lead_month');
            $table->unsignedInteger('leads');
            $table->unique(['year', 'month', 'lead_month'], 'crm_leads_over_time_period_unique');
        });

        Schema::create('CRM_Leads_By_Source', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->string('source');
            $table->unsignedTinyInteger('percentage');
            $table->unique(['year', 'month', 'source'], 'crm_leads_by_source_period_unique');
        });

        Schema::create('CRM_Pipeline_Overview', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->string('stage');
            $table->unsignedInteger('value');
            $table->unsignedTinyInteger('sort_order');
            $table->unique(['year', 'month', 'stage'], 'crm_pipeline_overview_period_unique');
        });

        Schema::create('CRM_Recent_Leads', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->string('name');
            $table->string('company');
            $table->string('source');
            $table->string('status');
            $table->date('lead_date');
        });

        Schema::create('CRM_Top_Opportunities', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedSmallInteger('year');
            $table->string('month');
            $table->string('opportunity');
            $table->string('company');
            $table->unsignedInteger('value');
            $table->string('stage');
            $table->date('close_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CRM_Top_Opportunities');
        Schema::dropIfExists('CRM_Recent_Leads');
        Schema::dropIfExists('CRM_Pipeline_Overview');
        Schema::dropIfExists('CRM_Leads_By_Source');
        Schema::dropIfExists('CRM_Leads_Over_Time');
    }
};
