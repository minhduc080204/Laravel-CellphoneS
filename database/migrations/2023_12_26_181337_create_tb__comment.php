<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb__comment', function (Blueprint $table) {
            $table->bigIncrements("CommentID");
            $table->string('Comment')->nullable();
            $table->dateTime('Date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->bigInteger('ProductID')->unsigned();
            $table->bigInteger('UserID')->unsigned();

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
        Schema::dropIfExists('tb__comment');
    }
};
