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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('no_order')->nullable();
            $table->enum('status', [1, 2, 3])->comment('1: pending, 2: on progress, 3: done')->default(1);
            $table->string('province_origin');
            $table->string('city_origin');
            $table->string('province_destination');
            $table->string('city_destination');
            $table->integer('weight');
            $table->string('courier');
            $table->integer('shipping_price');
            $table->integer('total_price');
            $table->enum('payment_status', [1, 2])->comment('1: belum di bayar, 2: sudah di bayar')->default(1);
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
        Schema::dropIfExists('orders');
    }
};