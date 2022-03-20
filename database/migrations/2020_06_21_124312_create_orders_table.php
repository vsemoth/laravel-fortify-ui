<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->text('cart');
            $table->string('name');
            $table->string('last_name');
            $table->string('billing_email');
            $table->string('addressline1');
            $table->string('addressline2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->string('country');
            $table->integer('phone');
            $table->string('order_id');
            $table->string('order_totalPrice')->nullable();
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
}
