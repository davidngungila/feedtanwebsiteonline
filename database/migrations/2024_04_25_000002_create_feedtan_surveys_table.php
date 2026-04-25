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
        Schema::create('feedtan_surveys', function (Blueprint $table) {
            $table->id();
            
            // Customer Information
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_email')->nullable();
            $table->text('customer_location')->nullable();
            
            // Survey Responses - Section 1: Frequently Purchased Products
            $table->json('frequently_purchased_products')->nullable(); // Array of selected products
            
            // Section 2: Delivery Service
            $table->boolean('wants_delivery_service')->nullable();
            
            // Section 3: Survey Table (Multiple products with details)
            $table->json('survey_table_data')->nullable(); // Array of product details
            
            // Section 4: Hard to Find Products
            $table->text('hard_to_find_product')->nullable();
            
            // Section 5: Products to Sell
            $table->text('products_to_sell')->nullable();
            
            // Section 6: Additional Suggestions
            $table->text('additional_suggestions')->nullable();
            
            // Metadata
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedtan_surveys');
    }
};
