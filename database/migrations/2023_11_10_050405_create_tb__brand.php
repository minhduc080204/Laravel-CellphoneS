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
        Schema::create('tb__brand', function (Blueprint $table) {
            $table->bigIncrements('BrandID');
            $table->string('Name')->nullable();
            $table->boolean('Type')->nullable();
            $table->string('Image')->nullable();
            
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb__brand');
    }
};
