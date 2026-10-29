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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('customer_phone')->nullable()->after('customer_email');
            $table->string('shipping_address')->nullable()->after('customer_phone');
            $table->string('shipping_city')->nullable()->after('shipping_address');
            $table->string('shipping_state')->nullable()->after('shipping_city');
            $table->string('shipping_postcode')->nullable()->after('shipping_state');
            $table->string('shipping_country')->default('Australia')->after('shipping_postcode');
            $table->string('shipping_method')->default('standard')->after('shipping_country');
            $table->decimal('shipping_cost', 10, 2)->default(0.00)->after('shipping_method');
            $table->decimal('discount_amount', 10, 2)->default(0.00)->after('shipping_cost');
            $table->string('discount_code')->nullable()->after('discount_amount');
            $table->string('payment_method')->default('card')->after('discount_code');
            $table->string('payment_status')->default('paid')->after('payment_method');
            $table->text('notes')->nullable()->after('payment_status');
            $table->json('items')->nullable()->after('notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'customer_phone',
                'shipping_address',
                'shipping_city',
                'shipping_state',
                'shipping_postcode',
                'shipping_country',
                'shipping_method',
                'shipping_cost',
                'discount_amount',
                'discount_code',
                'payment_method',
                'payment_status',
                'notes',
                'items',
            ]);
        });
    }
};
