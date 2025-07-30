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
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->string('ItmCode')->unique();
            $table->string('ItmName');
            $table->string('ItmFrgnName');
            $table->string('ItmUomCode');
            $table->string('ItmSegment');
            $table->string('ItmType');
            $table->string('ItmSeries');
            $table->string('ItmKimap');
            $table->string('ItmBrand');
            $table->string('ItmProfitCenter');
            $table->string('ItmProject');
            $table->float('ItmPrice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
