<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('hotels', function (Blueprint $table){
            $table->unsignedBigInteger('type_id');

            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    public function down(): void
    {
        Schema::table('hotels', function (Blueprint $table){
            $table->dropForeign(['type_id']);
            $table->dropColumn(['type_id']);
        });
    }
};
