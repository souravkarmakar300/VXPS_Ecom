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
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->json('images')->nullable()->after('image');
            $table->longText('features')->nullable()->after('description');
            $table->longText('specification')->nullable()->after('features');
            $table->longText('whats_include')->nullable()->after('specification');
            $table->longText('compatibility')->nullable()->after('whats_include');
            $table->longText('faq')->nullable()->after('compatibility');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropConstrainedForeignId('category_id');
            $table->dropColumn([
                'images',
                'features',
                'specification',
                'whats_include',
                'compatibility',
                'faq',
            ]);
        });
    }
};
