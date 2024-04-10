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
        Schema::create('tb__cart', function (Blueprint $table) {
            $table-> bigIncrements('CartID');
            $table->integer('Quantity');
            $table->bigInteger('ColorID')->unsigned();
            $table->bigInteger('VersionID')->unsigned();
            $table->bigInteger('ProductID')->unsigned();
            $table->bigInteger('UserID')->unsigned();

            $table->foreign('ColorID')->references('ColorID')->on('tb__color')->onDelete('cascade');
            $table->foreign('VersionID')->references('VersionID')->on('tb__version')->onDelete('cascade');
            $table->foreign('ProductID')->references('ProductID')->on('tb__product')->onDelete('cascade');
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb__cart');
    }
};
