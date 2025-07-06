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
        Schema::table('made_to_measure_requests', function (Blueprint $table) {
            $table->integer('quantity')->after('product_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('made_to_measure_requests', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
};
