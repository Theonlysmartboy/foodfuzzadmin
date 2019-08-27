<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_267761')->references('id')->on('categories');
            $table->unsignedInteger('restaurant_id');
            $table->foreign('restaurant_id', 'restaurant_fk_267762')->references('id')->on('restaurants');
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_267768')->references('id')->on('users');
        });
    }
}
