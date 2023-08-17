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
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('product_id')->unsigned()->default(1);
            $table->unsignedBigInteger('product_feature_id')->unsigned()->nullable();
            $table->unsignedBigInteger('image_url_id')->unsigned()->nullable();
            $table->string('name');
            $table->integer('quantity');
            $table->integer('total');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('county');
            $table->string('postcode');
            $table->string('payment_gateway')->default('zarinpal');
            $table->string('transaction_id');
            $table->string('error')->nullable();
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
