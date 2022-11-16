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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('order_items_id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('order_info_id')->on('order_infos')->onDelete('cascade');
            $table->integer('product_id');
            $table->string('orderItm_color');
            $table->string('orderItm_size');
            $table->integer('orderItm_qty');
            $table->float('orderItm_price', 8,2);
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
        Schema::dropIfExists('order_items');
    }
};
