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
        Schema::create('suggested_buckets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bucket_id');
            $table->unsignedBigInteger('ball_id');
            $table->foreign('bucket_id')->references('id')->on('buckets');
            $table->foreign('ball_id')->references('id')->on('balls');           
            $table->integer('count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggested_buckets');
    }
};
