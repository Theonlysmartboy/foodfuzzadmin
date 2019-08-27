<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_267712')->references('id')->on('users');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id', 'product_fk_267766')->references('id')->on('products');
            $table->unsignedInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_267776')->references('id')->on('statuses');
        });
    }
}
