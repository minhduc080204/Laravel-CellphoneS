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
        Schema::create('tb__order_detail', function (Blueprint $table) {
            $table->bigIncrements('OderDetailID');
            $table->integer('Quantity')->nullable();
            $table->bigInteger('ProductID')->unsigned();
            $table->bigInteger('VersionID')->unsigned();
            $table->bigInteger('ColorID')->unsigned();
            $table->bigInteger('OrderID')->unsigned();

            $table->foreign('ProductID')->references('ProductID')->on('tb__product')->onDelete('cascade');
            $table->foreign('VersionID')->references('VersionID')->on('tb__version')->onDelete('cascade');            
            $table->foreign('ColorID')->references('ColorID')->on('tb__color')->onDelete('cascade');
            $table->foreign('OrderID')->references('OrderID')->on('tb__orders')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb__order_detail');
    }
};
