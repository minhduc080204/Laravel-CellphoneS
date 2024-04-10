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
        Schema::create('tb__customer', function (Blueprint $table) {
            $table->bigIncrements('CustomerID');
            $table->string('Name')->nullable();
            $table->string('Contact')->nullable();
            $table->string('Email')->nullable();
            $table->string('Address')->nullable();

            // $table->bigInteger('CartID')->unsigned();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb__customer');
    }
};
