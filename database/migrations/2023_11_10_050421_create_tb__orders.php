<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb__orders', function (Blueprint $table) {
            $table->bigIncrements('OrderID');
            $table->integer('Price')->nullable();
            $table->integer('Quantity')->nullable();
            $table->dateTime('OrderDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('Status')->nullable();
            $table->boolean('Delivered')->nullable();            
            $table->bigInteger('CustomerID')->unsigned();
            $table->bigInteger('UserID')->unsigned();

            $table->foreign('CustomerID')->references('CustomerID')->on('tb__customer')->onDelete('cascade');
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb__orders');
    }
};

