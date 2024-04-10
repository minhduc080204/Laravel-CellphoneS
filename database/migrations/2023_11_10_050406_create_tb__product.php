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
        Schema::create('tb__product', function (Blueprint $table) {
            $table->bigIncrements('ProductID');
            $table->string('Name')->nullable();
            $table->boolean('Status')->nullable();
            $table->string('Image')->nullable();
            $table->integer('Price')->nullable()->default(0);
            $table->boolean('VAT')->nullable();
            $table->integer('Quantity')->nullable()->default(0);
            $table->integer('Warranty')->nullable()->default(0);
            $table->text('Description')->nullable();
            $table->boolean('Type')->nullable();
            $table->text('Detail')->nullable();
            // $table->bigInteger('CateID')->unsigned()->nullable();
            $table->bigInteger('BrandID')->unsigned()->nullable();

            // $table->foreign('CateID')->references('CateID')->on('tb__product_cate')->onDelete('cascade');
            $table->foreign('BrandID')->references('BrandID')->on('tb__brand')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb__product');
    }
};
