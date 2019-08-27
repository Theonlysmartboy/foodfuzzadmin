<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');
            $table->string('ordered_by');
            $table->string('delivery_to');
            $table->decimal('cost', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
