<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('user_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            //$table->string('phone');
            $table->string('address1');
            $table->string('address2');
            $table->string('phone');
            $table->string('area');
            $table->string('LGA');
            $table->tinyInteger('status')->default('0');
            $table->string('total_price')->nullable();
            
            $table->string('cake_message')->nullable();
            $table->string('flavour')->nullable();
            $table->string('size_id')->nullable();
            $table->string('order_details')->nullable();
            $table->string('tracking_no'); 
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
