<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solar_estimations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            
            // Step 1: Electricity Usage
            $table->decimal('monthly_kwh', 10, 2)->nullable();
            $table->decimal('monthly_bill', 10, 2)->nullable();
            $table->enum('connection_type', ['single', 'three'])->nullable();
            
            // Step 2: Location & Roof
            $table->string('city')->nullable();
            $table->decimal('peak_sun_hours', 5, 2)->nullable();
            $table->string('roof_type')->nullable();
            $table->decimal('roof_area', 10, 2)->nullable();
            $table->enum('battery_option', ['no', 'partial', 'full'])->nullable();
            
            // Step 3: Calculations
            $table->decimal('system_size', 10, 2)->nullable();
            $table->decimal('daily_generation', 10, 2)->nullable();
            $table->decimal('monthly_generation', 10, 2)->nullable();
            $table->integer('panel_count')->nullable();
            $table->decimal('inverter_capacity', 10, 2)->nullable();
            $table->decimal('battery_capacity', 10, 2)->nullable();
            
            // Step 4: Package Selection
            $table->string('selected_panel')->nullable();
            $table->decimal('panel_price', 10, 2)->nullable();
            $table->string('selected_inverter')->nullable();
            $table->decimal('inverter_price', 10, 2)->nullable();
            $table->string('selected_battery')->nullable();
            $table->decimal('battery_price', 10, 2)->nullable();
            $table->decimal('installation_service_cost', 10, 2)->default(0);
            $table->decimal('warranty_service_cost', 10, 2)->default(0);
            
            // Step 5: Total
            $table->decimal('total_price', 10, 2)->nullable();
            $table->decimal('estimated_monthly_savings', 10, 2)->nullable();
            $table->decimal('estimated_annual_savings', 10, 2)->nullable();
            
            // Contact Method
            $table->enum('contact_method', ['whatsapp', 'email'])->nullable();
            $table->text('additional_message')->nullable();
            
            // Status
            $table->enum('status', ['draft', 'submitted', 'quoted', 'converted'])->default('draft');
            $table->timestamp('submitted_at')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solar_estimations');
    }
};
