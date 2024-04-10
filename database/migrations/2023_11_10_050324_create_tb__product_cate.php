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
        Schema::create('tb__product_cate', function (Blueprint $table) {
            $table->bigIncrements('CateID');
            $table->string('Name')->nullable();
            $table->string('SeoTitle')->nullable();
            $table->boolean('Status')->nullable();
            $table->integer('Sort')->nullable();
            $table->integer('ParentID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb__product_cate');
    }
};
