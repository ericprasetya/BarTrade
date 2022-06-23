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
            $table->foreignId('seller_product_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('buyer_product_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('courier_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('payment_id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('type');
            $table->string('address');
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
