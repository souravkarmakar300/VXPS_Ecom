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
            if (! Schema::hasColumn('orders', 'stripe_payment_intent_id')) {
                $table->string('stripe_payment_intent_id')->nullable()->after('payment_status');
            }
            if (! Schema::hasColumn('orders', 'payment_reference')) {
                $table->string('payment_reference')->nullable()->after('stripe_payment_intent_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $columns = [];
            if (Schema::hasColumn('orders', 'stripe_payment_intent_id')) {
                $columns[] = 'stripe_payment_intent_id';
            }
            if (Schema::hasColumn('orders', 'payment_reference')) {
                $columns[] = 'payment_reference';
            }
            if ($columns !== []) {
                $table->dropColumn($columns);
            }
        });
    }
};
