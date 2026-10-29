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
        if (! Schema::hasColumn('products', 'special_offer_price')) {
            Schema::table('products', function (Blueprint $table) {
                $table->decimal('special_offer_price', 10, 2)->nullable()->after('price');
            });
        }

        if (Schema::hasColumn('products', 'stock')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('stock');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasColumn('products', 'stock')) {
            Schema::table('products', function (Blueprint $table) {
                $table->integer('stock')->default(0)->after('price');
            });
        }

        if (Schema::hasColumn('products', 'special_offer_price')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('special_offer_price');
            });
        }
    }
};
