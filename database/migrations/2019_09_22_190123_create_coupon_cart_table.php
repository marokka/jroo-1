<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_cart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('cart_id')->index();
            $table->unsignedInteger('coupon_id')->index();

//            $table->foreign('cart_id')->references('id')->on('carts');
//            $table->foreign('coupon_id')->references('id')->on('coupons');
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
        Schema::dropIfExists('coupon_cart');
    }
}
