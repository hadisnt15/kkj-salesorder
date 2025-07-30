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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('CstCode')->unique();
            $table->string('CstName');
            $table->string('CstAddress');
            $table->string('CstState');
            $table->string('CstCity');
            $table->string('CstPerson');
            $table->string('CstPhoneNum');
            $table->string('CstTermin');
            $table->float('CstLimit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
