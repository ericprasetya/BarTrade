<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_product_id');
            $table->foreignId('buyer_product_id');
            $table->foreignId('courier_id');
            $table->foreignId('payment_id');
            $table->string('type');
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
        Schema::dropIfExists('barters');
    }
}
