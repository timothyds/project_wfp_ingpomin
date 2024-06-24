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
        Schema::table('facility_product', function (Blueprint $table) {
            $table->foreign('facility_id')->references('id')->on('facilities');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('facility_product', function (Blueprint $table) {
            $table->dropForeign(['facility_id']);
            $table->dropForeign(['product_id']);
        });
    }
};
