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
        Schema::create('tb__color', function (Blueprint $table) {
            $table->bigIncrements('ColorID');
            $table->string('Color')->nullable();

            $table->bigInteger('ProductID')->unsigned();
            $table->foreign('ProductID')->references('ProductID')->on('tb__product')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb__color');
    }
};
