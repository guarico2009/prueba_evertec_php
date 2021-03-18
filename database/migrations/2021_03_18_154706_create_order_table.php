<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
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
          $table->string('order_id', 10)->unique();
          $table->string('customer_name', 80);
          $table->string('customer_email', 120);
          $table->string('customer_mobile', 40);
          $table->string('descripcion', 150);
          $table->double('total_order', 8, 2);
          $table->string('status', 20);
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
