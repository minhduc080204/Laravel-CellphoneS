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
        Schema::create('tb_specific_laptop', function (Blueprint $table) {
            $table->bigIncrements('LaptopID');
            $table->string('Cpu')->nullable();
            $table->string('Gpu')->nullable();
            $table->string('Ram')->nullable();
            $table->string('Ssd')->nullable();
            $table->string('Screen')->nullable();
            $table->string('Pin')->nullable();
            $table->string('Os')->nullable();
            $table->string('Material')->nullable();
            $table->string('Weight')->nullable();

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
        Schema::dropIfExists('tb_specific_laptop');
    }
};
