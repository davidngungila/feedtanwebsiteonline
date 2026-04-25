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
        Schema::create('customer_demands', function (Blueprint $table) {
            $table->id();
            $table->enum('gender', ['male', 'female']);
            $table->enum('age_group', ['<18', '18-25', '26-35', '36+']);
            $table->string('location');
            $table->enum('purchase_frequency', ['daily', 'weekly', 'occasionally']);
            $table->enum('current_purchase_place', ['market', 'nearby_store', 'online']);
            $table->boolean('food_products')->default(false);
            $table->boolean('beverages')->default(false);
            $table->boolean('cosmetics')->default(false);
            $table->boolean('household_items')->default(false);
            $table->text('additional_products')->nullable();
            $table->enum('price_range', ['very_low', 'average', 'slightly_high']);
            $table->decimal('price_example', 10, 2)->nullable();
            $table->json('challenges');
            $table->text('additional_comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_demands');
    }
};
