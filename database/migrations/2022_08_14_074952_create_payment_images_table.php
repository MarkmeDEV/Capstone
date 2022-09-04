<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_payment_id')->nullable();
            $table->foreign('order_payment_id')->references('id')->on('order_payments')->onUpdate('cascade')->onDelete('cascade');
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_images');
    }
};
